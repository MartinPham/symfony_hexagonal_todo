<?php


namespace Domain\Repository;
use Domain\Repository\Exception\TaskNotFoundException;
use Domain\Task;


/**
 * Interface TaskRepositoryInterface
 *
 * @category None
 * @package  Domain\Repository
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
interface TaskRepositoryInterface
{
    /**
     * Get all tasks
     *
     * @return mixed
     */
    public function findAll();

    /**
     * Save task
     *
     * @param Task $task Task object
     *
     * @return mixed
     */
    public function save(Task $task);

    /**
     * Find task by Id
     *
     * @param mixed $id Task id
     *
     * @return mixed|Task
     * @throws TaskNotFoundException
     */
    public function find($id) : Task;

    /**
     * Remove task
     *
     * @param Task $task Task object
     *
     * @return void
     */
    public function remove(Task $task);
}