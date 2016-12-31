<?php


namespace Infrastructure\Persistence\File\Task;
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
     * Storage file
     *
     * @var string
     */
    protected $db;

    /**
     * TaskRepository constructor
     */
    public function __construct()
    {
        $this->db = __DIR__ . '/tasks.txt';

        if (!file_exists($this->db)) {
            file_put_contents($this->db, '');
        }
    }

    /**
     * Get all tasks
     *
     * @return Task[]
     */
    public function findAll()
    {
        $content = file_get_contents($this->db);
        if ($content === '') {
            return [];
        }

        $data = explode("\n", $content);
        $return = [];
        foreach ($data as $row) {
            $row_data = explode('|||', $row);
            $task = new Task($row_data[1]);
            $task->setId($row_data[0]);

            $return[] = $task;
        }

        return $return;
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
        $all = $this->findAll();

        $data = [];
        $exists = false;
        /**
         * Task object
         *
         * @var Task $t
         */
        foreach ($all as $t) {
            if ($t->getId() === $task->getId()) {
                $t = $task;
                $exists = true;
            }
            $data[] = $t->getId() . '|||' . $t->getName();
        }

        if (!$exists) {
            if ($task->getId() === null) {
                $task->setId(uniqid());
            }
            $data[] = $task->getId() . '|||' . $task->getName();
        }

        file_put_contents($this->db, implode("\n", $data));
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
        $all = $this->findAll();

        /**
         * Task object
         *
         * @var Task $t
         */
        foreach ($all as $t) {
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
        $all = $this->findAll();
        $data = [];

        /**
         * Task object
         *
         * @var Task $t
         */
        foreach ($all as $t) {
            if ($t->getId() !== $task->getId()) {
                $data[] = $t->getId() . '|||' . $t->getName();
            }
        }

        file_put_contents($this->db, implode("\n", $data));
    }
}