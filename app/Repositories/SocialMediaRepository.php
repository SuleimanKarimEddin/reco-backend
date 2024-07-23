<?php

namespace App\Repositories;

use App\Interfaces\SocialMediaInterface;
use App\Models\SocialMedia;
use App\Repositories\Base\CrudBaseRepository;
use App\Services\ImageService;

class SocialMediaRepository extends CrudBaseRepository
 {

    public function __construct() {
        parent::__construct(new SocialMedia);
          $this->filterable = [
             "search" =>[
                 'name'=>'string',
                 'category_id'=>'number'
             ],
         ];
    }

    public function edit(int $id, $data){

        $social_media = $this->findByID($id);

        $old_image  = $social_media->image;
        $image  = $old_image ;
        if(isset($data['image'])){
            $image = ImageService::update_image($data['image'] , $old_image , 'social_media');

        }


        return   parent::edit($id , [
            'image'=>$image,
            'link'=>$data['link']
        ]);


    }
    public function getSocialMedia(){
        $data = SocialMedia::where('is_active', 1)
            ->orderBy('social_media_sort')->get();

        return $data;
    }



}
