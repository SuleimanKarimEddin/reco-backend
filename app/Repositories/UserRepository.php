<?php

namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\Models\User;
use App\Repositories\Base\CrudBaseRepository;

class UserRepository extends CrudBaseRepository implements UserInterface
 {

    public function __construct() {
        parent::__construct(new User);


         $this->filterable = [

        "search" =>[
            // add column to use in search for function getAll that call in controller
            'name'=>'string',
        ],

        "sort" => [
            'created_at' =>'asc'
        ],
        // call back function can you make any think you want
        'custom'=> function($query){
            $query->select('*');
        },


    ];
    $this->relations = [];
    }
}
