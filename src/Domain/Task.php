<?php


namespace Domain;


/**
 * Class Task
 *
 * @category None
 * @package  Domain
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Task
{

    /**
     * Id of task
     *
     * @var mixed
     */
    protected $id;

    /**
     * Name of Task
     *
     * @var string
     */
    protected $name;


    /**
     * Task constructor
     *
     * @param string $name Name of task
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Return name of task
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set name of task
     *
     * @param string $name Name of task
     *
     * @return Task
     */
    public function setName(string $name) : Task
    {
        $this->name = $name;
        return $this;
    }


    /**
     * Get id of task
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id of task
     *
     * @param mixed $id Id of task
     *
     * @return Task
     */
    public function setId($id) : Task
    {
        $this->id = $id;
        return $this;
    }
}