<?php
// app/Helpers/ApiResponse.php
namespace App\Helpers;

class ApiResponse
{
 public static function success($data = null, $message = 'Success', $statusCode = 200)
{
    return response()->json([
        'status_code' => $statusCode,
        'message'     => $message,
        'data'        => $data
    ], $statusCode);
}


    public static function error($message = 'Error', $error = null, $statusCode = 400)
    {
        return response()->json([
            'status_code' => $statusCode,
            'message' => $message,
            'errors' => $error
        ], $statusCode);
    }
}
