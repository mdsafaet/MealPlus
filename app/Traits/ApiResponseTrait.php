<?php

namespace App\Traits;

trait ApiResponseTrait
{
    public function success(
        $data = null,
        string $message = 'Success',
        int $status_code = 200
    ) {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $status_code);
    }


    public function error(
        string $message = 'Error',
        int $status_code = 400,
        $data = null
    ) {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $status_code);
    }


    public function notFound(
        string $message = 'Resource not found',
        int $status_code = 404,
        $data = null
    ) {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $status_code);
    }


    public function unauthorized(
        string $message = 'Unauthorized',
        int $status_code = 401,
        $data = null
    ) {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $status_code);
    }


    public function validationError(
        $errors,
        string $message = 'Validation Error',
        int $status_code = 422
    ) {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'errors' => $errors
        ], $status_code);
    }


    public function serverError(
        string $message = 'Server Error',
        int $status_code = 500,
        $data = null
    ) {
        return $this->error($message, $status_code, $data);
    }


    public function customResponse(
        $data,
        string $message = 'Custom Response',
        int $status_code = 200
    ) {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $status_code);
    }


    public function forbidden(
        string $message = 'Forbidden',
        int $status_code = 403,
        $data = null
    ) {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => $data
        ], $status_code);
    }
}