<?php


namespace Infrastructure\Persistence\Memory\Task;
use Domain\Repository\Exception\TaskNotFoundException;
use Domain\Repository\TaskRepositoryInterface;
use Domain\Task;


/**
 * Class TaskRepository
 *
 * @category None
 * @package  Infrastructure\Persistence\File\Task
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Storage var
     *
     * @var Task[]
     */
    protected $tasks;

    /**
     * TaskRepository constructor
     */
    public function __construct()
    {
        $this->tasks = [];
    }

    /**
     * Get all tasks
     *
     * @return Task[]
     */
    public function findAll()
    {
        return $this->tasks;
    }

    /**
     * Save task
     *
     * @param Task $task Task object
     *
     * @return void
     */
    public function save(Task $task)
    {
        $this->tasks[] = $task;
    }

    /**
     * Find task by Id
     *
     * @param mixed $id Task id
     *
     * @return mixed|Task
     * @throws TaskNotFoundException
     */
    public function find($id) : Task
    {
        /**
         * Task object
         *
         * @var Task $t
         */
        foreach ($this->tasks as $t) {
            if ($t->getId() === $id) {
                return $t;
            }
        }

        throw new TaskNotFoundException('Cannot find task with Id ' . $id);
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
        /**
         * Task object
         *
         * @var Task $t
         */
        foreach ($this->tasks as $k => $t) {
            if ($t->getId() === $task->getId()) {
                unset($this->tasks[$k]);
            }
        }
    }
}