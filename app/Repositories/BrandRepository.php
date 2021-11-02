<?php
namespace App\Repositories;

use App\Models\Brand;

class Brandrepository 
{
    public function getAll(){
       return Brand::query()->get();
    }

    public function create($data){
        return Brand::create($data);
    }
}