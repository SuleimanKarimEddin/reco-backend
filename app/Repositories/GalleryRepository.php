<?php

namespace App\Repositories;

use App\Models\Gallery;
use App\Repositories\Base\CrudBaseRepository;
use App\Services\ImageService;
use Illuminate\Support\Facades\Log;

class GalleryRepository extends CrudBaseRepository
{
    public function __construct()
    {
        parent::__construct(new Gallery);

        $this->filterable = [

            'search' => [
                'name' => 'string',
                'category_id' => 'number',
            ],
            'sort' => [
                'created_at' => 'desc',
            ],
            'custom' => function ($query) {
                $query->select('id');
            },

        ];
        $this->relations = [];
    }

       public function getAllGallery(int $perPage = 8)
       {
           return Gallery::with('galleryTranslations')->paginate($perPage);
       }

       public function createGallery($data)
       {
           $image = ImageService::upload_image($data->image, 'gallery');
           $is_active = $data->is_active == 'true' ? 1 : 0;
           $gallery = Gallery::create([
               'URL' => $image,
               'width' => $data->width,
               'hight' => $data->hight,
               'type' => $data->type,
               'is_active' => $is_active,
           ]);

           $gallery->galleryTranslations()->create([
               'locale' => 'en',
               'title' => $data->en_title,
               'body' => $data->en_body,
           ]);
           $gallery->galleryTranslations()->create([
               'locale' => 'ar',
               'title' => $data->ar_title,
               'body' => $data->ar_body,
           ]);

           return $gallery;
       }

       public function edit($id, $data)
       {
           $gallery = parent::findByID($id);

           $old_gallery_image = $gallery->gallery_image;
           $gallery_image = $old_gallery_image;

           if (isset($data['image']) && $data['image'] != null) {
               $gallery_image = ImageService::update_image($data['image'], $old_gallery_image, 'gallery');
           }
           Log::info($data->is_active);

           $gallery = parent::edit($id, [
               'image' => $gallery_image,
               'is_active' => $data->is_active == 'true' ? 1 : 0,
           ]);
           $gallery->galleryTranslations()->where('locale', 'en')->update([
               'title' => $data['en_title'],
               'body' => $data['en_body'],
           ]);
           $gallery->galleryTranslations()->where('locale', 'ar')->update([
               'title' => $data['ar_title'],
               'body' => $data['ar_body'],
           ]);

           return $gallery;
       }

    public function delete($id)
    {
        $gallery = parent::findByID($id);
        $gallery->galleryTranslations()->delete();
        ImageService::delete_image($gallery->image);
        parent::delete($id);

        return $gallery;
    }
}
