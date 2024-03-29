<?php
/**
 * Created by PhpStorm.
 * User: diogoazevedo
 * Date: 03/11/15
 * Time: 00:03
 */

namespace IS\Services;

use IS\Repositories\ClientRepository;
use IS\Repositories\UserRepository;


class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {


        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function update(array $data,$id)
    {
        $this->clientRepository->update($data,$id);
        $userId = $this->clientRepository->find($id,['user_id'])->user_id;
        $this->userRepository->update($data['user'],$userId);
    }

    public function create(array $data)
    {

        $data['user']['password'] = bcrypt(123456);
        $user =  $this->userRepository->create($data['user']);
        $data['user_id']=$user->id;
        $this->clientRepository->create($data);

    }

}