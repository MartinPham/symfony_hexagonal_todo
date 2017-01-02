<?php


namespace Application\Task;
use Domain\Repository\TaskRepositoryInterface;
use Domain\Task;


/**
 * Class TaskService
 *
 * @category None
 * @package  Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class TaskService
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
     * Get all tasks
     *
     * @return Task[]
     */
    public function getAllTasks() : array
    {
        return $this->repository->findAll();
    }

    /**
     * Delete task
     *
     * @param mixed $id Task id
     *
     * @return void
     */
    public function deleteTask($id)
    {
        $task = $this->repository->find($id);
        $this->repository->remove($task);
    }

    /**
     * Create new task
     *
     * @param string $name Task name
     *
     * @return void
     */
    public function createTask(string $name)
    {
        $task = new Task($name);
        $this->repository->save($task);
    }


}