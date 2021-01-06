<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\ResponseTrait as ParentResponseTrailts;
use Illuminate\Validation\ValidationException;

trait ResponseTraits
{
    use ParentResponseTrailts;

    public function successResponse($data)
    {
        return response()->json($data, 200);
    }

    public function validationErrorResponse(ValidationException $exception)
    {
        return response()->json([
            'error' => $exception->errors()
        ], 422);
    }

    public function exceptionErrorResponse(Exception $exception)
    {
        $code = (empty($exception->getCode())) ? 422 : $exception->getCode();
        return response()->json([
            'error' => [$exception->getMessage()]], $code);
    }

    public function errorResponse($message)
    {
        return response()->json([
            'status' => false,
            'code' => 422,
            'error' => ['message' => [$message]]], 422);
    }
}
