<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\TagService;
use App\Traits\SendResponse;
use Illuminate\Http\JsonResponse;

class TagController extends Controller
{
    use SendResponse;

    private $tag_service;

    /**
     * QuoteController constructor.
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService)
    {
        $this->tag_service = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->sendResponse($this->tag_service->getAll(), '');
    }
}
