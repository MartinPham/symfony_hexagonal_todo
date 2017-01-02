<?php


namespace Application\Repository;


/**
 * Interface AdapterInterface
 *
 * @category None
 * @package  Application\Repository
 * @author   Martin Pham <i@martinpham.com>
 * @license  None http://
 * @link     None
 */
interface AdapterInterface
{
    public function setModelClass($class);

    public function list();

    public function create($object);

    public function read($id);

    public function update($id, $object);

    public function delete($id);
}