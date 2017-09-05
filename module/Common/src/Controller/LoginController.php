<?php
namespace Common\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Crypt\Password\Bcrypt;

class LoginController extends AbstractRestfulController
{
    protected $identifierName = 'token';

    /** @var \Common\Model\UsersTable */
    protected $usersTable;

    public function setUsersTable($usersTable)
    {
        $this->usersTable = $usersTable;
        return $this;
    }

    public function get($token)
    {
        if ($token !== false) {
            // 本来ならちゃんとしたtokenを処理して認証処理をするところを、雛形のため省略
            $jm = new JsonModel([]);
            if (ctype_digit($token)) {
                $record = $this->usersTable->getById($token);
                unset($record['password']);
            } else {
                throw new \Exception('parameter is invalid', 404);
            }
            $jm->setVariable('user',$record);
            return $jm;
        } else {
            throw new \Exception('no parameter', 404);
        }
    }

    /**
     * Method not available for this endpoint
     *
     * @return void
     */
    public function getList()
    {
        $this->methodNotAllowed();
    }

    /**
     * 認証処理を行う
     *
     * @return void
     */
    public function create($data)
    {
        $jm = new JsonModel([]);

        $record = $this->usersTable->getByUsername($data['username']);
        $bcrypt = new Bcrypt();
        if (!empty($record) && $bcrypt->verify($data['password'], $record->password)){
            unset($record['password']);
            $jm->setVariable('user',$record->getArrayCopy());
        } else {
            $jm->setVariable('user',null);
        }
        return $jm;
    }

    /**
     * Method not available for this endpoint
     *
     * @return void
     */
    public function update($id, $data)
    {
        $this->methodNotAllowed();
    }

    /**
     * Method not available for this endpoint
     *
     * @return void
     */
    public function delete($id)
    {
        $this->methodNotAllowed();
    }

    protected function methodNotAllowed()
    {
        $this->response->setStatusCode(\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405);
    }

}