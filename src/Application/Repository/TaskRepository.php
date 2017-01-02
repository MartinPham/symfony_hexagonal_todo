<?php

namespace Application\Repository;

use Domain\Repository\TaskRepositoryInterface;
use Domain\Task;

/**
 * Class TaskRepository
 *
 * @category None
 * @package  Application\Repository
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Adapter
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * TaskRepository constructor
     *
     * @param AdapterInterface $adapter Adapter
     */
    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        $this->adapter->setModelClass(Task::class);
    }

    /**
     * Get all tasks
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->adapter->list();
    }

    /**
     * Save task
     *
     * @param Task $task Task object
     *
     * @return mixed
     */
    public function save(Task $task)
    {
        if ($task->getId() === null || $this->adapter->read($task->getId()) === null) {
            return $this->adapter->create($task);
        }
        return $this->adapter->update($task->getId(), $task);
    }

    /**
     * Find task by Id
     *
     * @param mixed $id Task id
     *
     * @return Task
     */
    public function find($id) : Task
    {
        return $this->adapter->read($id);
    }

    /**
     * Remove task
     *
     * @param Task $task Task object
     *
     * @return void
     */
    public function remove(Task $task)
    {
        return $this->adapter->delete($task->getId());
    }
}
