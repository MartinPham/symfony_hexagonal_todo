<?php


namespace Infrastructure\Persistence\Adapter\DoctrineORM;

use Application\Repository\AdapterInterface;
use Doctrine\ORM\EntityManager;


/**
 * Class DoctrineORMAdapter
 *
 * @category None
 * @package  Infrastructure\Persistence\Adapter\DoctrineORM
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
class Adapter implements AdapterInterface
{
    /**
     * Entity Manager
     *
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * Model Class
     *
     * @var mixed
     */
    protected $modelClass;

    /**
     * Adapter constructor
     *
     * @param EntityManager $entityManager Entity Manager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function setModelClass($class)
    {
        $this->modelClass = $class;
    }

    /**
     * List
     *
     * @return array
     */
    public function list()
    {
        return $this->entityManager->getUnitOfWork()->getEntityPersister($this->modelClass)->loadAll();
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
        $this->entityManager->persist($object);
        $this->entityManager->flush();
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
        return $this->entityManager->find($this->modelClass, $id);
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
        $this->entityManager->persist($object);
        $this->entityManager->flush();
    }

    /**
     * Delete
     *
     * @param mixed $id Id
     *
     * @return void
     */
    public function delete($id)
    {
        $object = $this->entityManager->find($this->modelClass, $id);


        $this->entityManager->remove($object);
        $this->entityManager->flush();
    }
}