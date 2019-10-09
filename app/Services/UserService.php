<?php


namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function search($params)
    {
        $users = $this->userRepository->search($params);

        return $users;
    }

    public function find($userId)
    {
        return $this->userRepository->find($userId);
    }
}
