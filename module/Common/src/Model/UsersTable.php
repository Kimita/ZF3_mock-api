<?php
namespace Common\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\AdapterAwareInterface;

class UsersTable extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table = 'users';

    protected $identColumn = 'id';

    /**
     * Set db adapter
     *
     * @param Adapter $adapter
     */
    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
        return $this;
    }

    /**
     * Method to get user by id
     *
     * @param int $id
     * @return ArrayObject
     */
    public function getById($id)
    {
        $rowset = $this->select(array($this->identColumn => $id));

        return $rowset->current();
    }

    /**
     * Method to get user by username
     *
     * @param string $username
     * @return ArrayObject
     */
    public function getByUsername($username)
    {
        $rowset = $this->select(array('username' => $username));

        return $rowset->current();
    }

}