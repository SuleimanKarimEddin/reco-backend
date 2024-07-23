<?php 

namespace App\Repositories;

use App\Models\Activity;
use App\Repositories\Base\CrudBaseRepository;
use App\Services\ImageService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Log;

class  ActivityRepository extends CrudBaseRepository {

    public function __construct() {
        parent::__construct(new Activity);

        $this->relations = [];
        $this->filterable = [

        ];

    }

    public function create($data){

        $image = ImageService::upload_image($data->image , 'activity');
        $activity = Activity::create([
            'activity_image'=>$image,
            'start_date'=>$data->start_date,
            'end_date'=>$data->end_date,
        ]);

        $activity->activityTranslations()->create([
            'locale' => '1',
            'title'=>$data->en_title,
            'description'=>$data->en_description,
            'location'=>$data->en_location,
        ]);
        $activity->activityTranslations()->create([
            'locale' => '2',
            'title'=>$data->ar_title,
            'description'=>$data->ar_description,
            'location'=>$data->ar_location
        ]);
        return $activity;
    }

    public function edit($id,$data){
        $activity = parent::findByID($id);

        $old_activity_image = $activity->activity_image;
        $activity_image = $old_activity_image;

        if(isset($data['image'])) {
            $activity_image=ImageService::update_image($data['image'],$old_activity_image,'activity');
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       

        $activity = parent::edit($id ,[
            "activity_image" =>$activity_image
        ]);
        $activity->activityTranslations()->where('locale', '1')->update([
            'title'=> $data['en_title'],
            'description'=>$data['en_description'],
            'location'=>$data['en_location'],
        ]);
        $activity->activityTranslations()->where('locale', '2')->update([
            'title'=> $data['ar_title'],
            'description'=>$data['ar_description'],
            'location'=>$data['ar_location']
        ]);

        return $activity;
    }

    public function delete($id){
        $activity = parent::findByID($id);
        $activity->activityTranslations()->delete();
        ImageService::delete_image($activity->activity_image);
        parent::delete($id);
        return $activity;
    }

    public function getAllForDashboard(){
        $data = Activity::query();
        $data =$data->with('activityTranslations')->get();
        return $data;
    }

    public function getOneForDashboard(int $activity_id){
        $activity = Activity::where('id',$activity_id)
        ->with('activityTranslations')->get();
        return $activity;
    }

    public function getAllActivity(){
        $data =  Activity::with('activityTranslations')->get();
        return $data;
    }

    public function getOne(int $activity_id){
        $activity = Activity::with('activityTranslations')->where('id',$activity_id)->get();
        return $activity;
    }
}

