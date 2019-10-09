<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Helpers\ResponseHelper;
use App\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * [GET] users/get
     * @param Request $request
     * @return mixed
     */
    public function get(Request $request)
    {
        $users = $this->userService->search($request->all());
        if (!$users) {
            return response()->json(null, 404);
        }

        return ResponseHelper::success([
            "users" => array_values($users->get()->toArray())
        ]);
    }
}
