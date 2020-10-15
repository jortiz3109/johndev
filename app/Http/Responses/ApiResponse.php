<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function dispatch(string $message, $data = null, int $status = 200, $headers = [])
    {
        return new JsonResponse(compact('message', 'data'), $status, $headers);
    }
}
