<?php


namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function search($params)
    {
        $users = User::orderBy('id', 'DESC');

        if (!empty($params['keyword'])) {
            $name = $params['keyword'];
            $users->whereRaw("name_en LIKE '%$name%' LIKE '%$name%'");
        }

        return $users;
    }

    public function find($id)
    {
        return User::find($id);
    }
}
