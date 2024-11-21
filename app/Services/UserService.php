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
            $users =  User::select('name', 'email' ,'phone', 'age', 'created_at')->paginate(10);
            $data = UserLimitedDataResource::collection($users);
            return [
                'data' => $data, // Send the paginated data
                'meta' => [
                    'total' => $users->total(),   // Total records
                    'per_page' => $users->perPage(), // Items per page
                    'current_page' => $users->currentPage(), // Current page
                    'last_page' => $users->lastPage(), // Last page
                    'next_page_url' => $users->nextPageUrl(),
                    'prev_page_url' => $users->previousPageUrl(),
                ],
            ];
        }catch(Exception $exp)
        {
            Log::info($exp->getMessage());
            return false;
        }
    }
}