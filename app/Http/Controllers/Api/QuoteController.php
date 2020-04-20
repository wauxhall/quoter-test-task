<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuoteRequest;
use App\Services\QuoteService;
use App\Traits\SendResponse;
use Illuminate\Http\JsonResponse;

class QuoteController extends Controller
{
    use SendResponse;

    private $quote_service;

    /**
     * QuoteController constructor.
     * @param QuoteService $quoteService
     */
    public function __construct(QuoteService $quoteService)
    {
        $this->quote_service = $quoteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->sendResponse($this->quote_service->getAll(), '');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateQuoteRequest $request
     * @return JsonResponse
     */
    public function store(CreateQuoteRequest $request)
    {
        return $this->sendResponse($this->quote_service->create($request->all()), 'Цитата опубликована');
    }
}
