<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    //

    public function successResponse($data = [], $message = "Data found succesfully!", $statusCode = 200)
    {
        return response()->json(
            [
                'data'      => $data,
                'message'   => $message,
                'status'    => 'success'
            ], $statusCode
        );
    }

    public function errorResponse($data = [], $message = "No data found!", $statusCode = 400)
    {
        return response()->json(
            [
                'data'      => $data,
                'message'   => $message,
                'status'    => 'error'
            ], $statusCode
        );
    }
}
