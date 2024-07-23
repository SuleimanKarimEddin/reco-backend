<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\ResponseEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\CreateGalleryRequest;
use App\Http\Requests\Gallery\DeleteGalleryRequest;
use App\Http\Requests\Gallery\GetAllGalleryRequest;
use App\Http\Requests\Gallery\UpdateGalleryRequest;
use App\Http\Resources\Gallery\GetAllGalleryResource;
use App\Repositories\GalleryRepository;

class GalleryController extends Controller
{
    public function __construct(private GalleryRepository $galleryRepository)
    {
    }

    public function getAll(GetAllGalleryRequest $request)
    {
        $data = $this->galleryRepository->getAllGallery($request->per_page ?? 8);
        $response = GetAllGalleryResource::collection($data);

        return $this->sendResponse(ResponseEnum::GET, $response);
    }

    public function create(CreateGalleryRequest $request)
    {
        $data = $this->galleryRepository->createGallery($request);

        return $this->sendResponse(ResponseEnum::ADD, $data);
    }

    public function update(UpdateGalleryRequest $request)
    {
        $data = $this->galleryRepository->edit($request->id, $request);

        return $this->sendResponse(ResponseEnum::UPDATE, $data);
    }

    public function delete(DeleteGalleryRequest $request)
    {
        $data = $this->galleryRepository->delete($request->id);

        return $this->sendResponse(ResponseEnum::DELETE, $data);
    }
}
