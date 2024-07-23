<?php

namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\User;
use App\Repositories\Base\CrudBaseRepository;
use App\Services\ImageService;

class CategoryRepository extends CrudBaseRepository {

    public function __construct() {
        parent::__construct(new Category);

        $this->relations = ['categoryTranslations:id,category_id,name'];
        $this->filterable = [

        ];

    }
    public function create($data){

        $category = Category::create([
        ]);

        $category->categoryTranslations()->create([
            'locale' => '1',
            'name'=>$data->en_name
        ]);
        $category->categoryTranslations()->create([
            'locale' => '2',
            'name'=>$data->ar_name
        ]);

        return $category ;
    }
    public function edit($id  , $data){
        $category = parent::findByID($id);

     
        $category->categoryTranslations()->where('locale', '1')->update([
            'name'=> $data->en_name
        ]);
        $category->categoryTranslations()->where('locale', '2')->update([
            'name'=> $data->ar_name
        ]);

        return $category;

    }
    public function delete($id)
    {

            $category =parent::findByID($id);

            $category->categoryTranslations()->delete();


            parent::delete($id);
    }
    public function getAllCategoryForDashboard(int $perPage = 8, $search = null){

        $data = Category::query();


        if($search){
            $data->whereHas('categoryTranslations' , function($query) use ($search){
                $query->where('name' ,"LIKE" ,  "%". $search . "%");
            });
        }


        $data =$data->with('categoryTranslations');
        return $data->get();

    }
    public function getOneForDashboard(int $category_id){
        $category = Category::where('id',$category_id)
        ->with('categoryTranslations')
        ->first();
        return $category;
    }
    public function getAllCategory($perPage){

        $data =  Category::with('translation')->where('level' ,'=' , 0);

        return $data->paginate($perPage);

    }
    public function getOne($category_id){
        $category = Category::with('translation')->where('id',$category_id)
        ->first();
        return $category;
    }
    public function updateCategoryStatus($category_id , $new_status){
        $category = Category::where('id', $category_id)->first();
        if (isset($new_status)) {
            $category->is_active = $new_status == false ? 0 : 1;
            $category->save();
        }

        return [];
    }

}
