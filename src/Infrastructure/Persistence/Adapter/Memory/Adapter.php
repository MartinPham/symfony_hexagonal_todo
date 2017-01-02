<?php


namespace Infrastructure\Persistence\Adapter\Memory;
use Application\Repository\AdapterInterface;


/**
 * Class Adapter
 *
 * @category None
 * @package  Infrastructure\Persistence\Adapter\Memory
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Adapter implements AdapterInterface
{
    protected $data;

    /**
     * Adapter constructor
     */
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * Set Model Class
     *
     * @param mixed $class Class
     *
     * @return void
     */
    public function setModelClass($class)
    {

    }

    /**
     * List
     *
     * @return array
     */
    public function list()
    {
        return $this->data;
    }

    /**
     * Create
     *
     * @param mixed $object Object
     *
     * @return void
     */
    public function create($object)
    {
        $this->data[] = $object;
    }

    /**
     * Read
     *
     * @param mixed $id Id
     *
     * @return mixed
     */
    public function read($id)
    {
        return $this->data[$id];
    }

    /**
     * Update
     *
     * @param mixed $id     Id
     * @param mixed $object Object
     *
     * @return void
     */
    public function update($id, $object)
    {
        $this->data[$id] = $object;
    }

    /**
     * Delete
     *
     * @return void
     */
    public function delete()
    {
        unset($this->data[$id]);
    }
}