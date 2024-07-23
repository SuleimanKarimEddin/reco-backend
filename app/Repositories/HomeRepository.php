<?php

namespace App\Repositories;

use App\Models\Activity;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Post;
use App\Models\SocialMedia;

class HomeRepository {

    public function getWebSiteData(){
        
        $data = [];
        $data['partner'] = Partner::all();
        $data['socialmedia'] = SocialMedia::all();

    
        return $data; 

    }
    public function getAllStatics(){

        $data=[];

        $data['category_count'] = Category::count();


        $data['post_count'] = Post::count();

        $data['activity_count'] = Activity::count();


        return $data ;
    }

}
