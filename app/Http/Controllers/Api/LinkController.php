<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkCreateRequest;
use App\Interface\LinkServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller
{
    public function __construct(
        private LinkServiceInterface $service,
    ) {
    }

    public function create(LinkCreateRequest $request): JsonResponse
    {
        $validateData = $request->validated();

        try {
            $data = $this->service->create($validateData);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], Response::HTTP_BAD_REQUEST);
        }

        return response()->json($data, Response::HTTP_CREATED);
    }
}
