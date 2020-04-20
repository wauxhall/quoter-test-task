<?php

namespace App\Exceptions;

use App\Traits\SendResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ValidationException extends Exception
{
    use SendResponse;

    /**
     * Report the exception.
     *
     * @return void
     */
    public function report(): void
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function render(Request $request): JsonResponse
    {
        return $this->sendError($this->getMessage(), [], 422);
    }
}
