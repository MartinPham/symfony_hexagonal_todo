<?php


namespace Application\Task;

use Domain\Repository\TaskRepositoryInterface;
use Domain\Task;

/**
 * Class DeleteTask
 *
 * @category None
 * @package  Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class DeleteTask
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

}