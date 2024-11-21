<?php
namespace App\Services;

use App\Http\Resources\V1\UserLimitedDataResource;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class UserService {

    public function getUsers()
    {
        try{
            $users = User::select('name', 'email' ,'phone', 'age', 'created_at')->paginate(20);
            return UserLimitedDataResource::collection($users);
        }catch(Exception $exp)
        {
            Log::info($exp->getMessage());
            return false;
        }
    }
}