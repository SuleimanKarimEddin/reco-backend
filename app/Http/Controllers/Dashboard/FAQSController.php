<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\FAQS\CreateFAQSRequest;
use App\Http\Requests\FAQS\DeleteFAQSRequest;
use App\Http\Requests\FAQS\GetAllFAQSRequest;
use App\Http\Requests\FAQS\UpdateFAQSRequest;
use App\Http\Resources\FAQS\GetAllFAQSResource;
use App\Repositories\FaqsRepository;

class FAQSController extends Controller
{
    public function __construct(private FaqsRepository $repository)
    {
    }

    public function getAll(GetAllFAQSRequest $request)
    {
        $data = $this->repository->showAllFaqs($request->per_page ?? 8);
        $response = GetAllFAQSResource::collection($data);

        return $this->sendResponse(ResponseEnum::GET, $response);
    }

    public function create(CreateFAQSRequest $request)
    {
        $this->repository->createFaq($request);

        return $this->sendResponse(ResponseEnum::ADD);
    }

    public function update(UpdateFAQSRequest $request)
    {
        $data = $this->repository->updatedFaq($request);

        return $this->sendResponse(ResponseEnum::UPDATE, $data);
    }

    public function delete(DeleteFAQSRequest $request)
    {
        $this->repository->deleteFaqs($request->id);

        return $this->sendResponse(ResponseEnum::DELETE);
    }
}
