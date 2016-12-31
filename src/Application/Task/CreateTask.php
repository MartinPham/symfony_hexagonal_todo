<?php


namespace Application\Task;
use Domain\Repository\TaskRepositoryInterface;
use Domain\Task;


/**
 * Class CreateTask
 *
 * @category None
 * @package  Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class CreateTask
{
    /**
     * Task repository
     *
     * @var TaskRepositoryInterface
     */
    protected $repository;

    /**
     * CreateTask constructor
     *
     * @param TaskRepositoryInterface $repository Task repository
     */
    public function __construct(TaskRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create new task
     *
     * @param string $name Task name
     *
     * @return mixed Task ID
     */
    public function createTask(string $name)
    {
        $task = new Task($name);
        $this->repository->save($task);
        return $task->getId();
    }


}