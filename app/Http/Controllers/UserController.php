<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    //

    public function users(UserService $userService)
    {
        $data = $userService->getUsers();

        if($data){
            return $this->successResponse($data);
        }

        return $this->errorResponse(statusCode:404);
    }
}
