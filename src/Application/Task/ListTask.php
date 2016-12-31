<?php

namespace Application\Task;
use Domain\Repository\TaskRepositoryInterface;
use Domain\Task;

/**
 * Class ListTask
 *
 * @category None
 * @package  Application\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class ListTask
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
}
