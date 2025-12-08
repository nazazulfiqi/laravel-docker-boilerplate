<?php
// app/Helpers/ApiResponse.php
namespace App\Helpers;

class ApiResponse
{
    public static function success($data = null, $message = 'Success', $statusCode = 200, $meta = null)
    {
        $response = [
            'status_code' => $statusCode,
            'message'     => $message,
            'data'        => $data
        ];

        if ($meta) {
            $response['meta'] = $meta;
        }

        return response()->json($response, $statusCode);
    }

    public static function paginated($paginator, $message = 'Success', $statusCode = 200)
    {
        return self::success(
            $paginator->items(), // actual data
            $message,
            $statusCode,
            [
                'current_page' => $paginator->currentPage(),
                'last_page'    => $paginator->lastPage(),
                'per_page'     => $paginator->perPage(),
                'total'        => $paginator->total(),
                'next_page_url' => $paginator->nextPageUrl(),
                'prev_page_url' => $paginator->previousPageUrl(),
            ]
        );
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
