<?php
namespace App\Repositories;

use App\Models\Brand;

class Brandrepository 
{
    public function getAll(){
       return Brand::query()->get();
    }

    public function getById($id){
        return Brand::find($id);
    }

    public function create($data){
        return Brand::create($data);
    }

    public function update($id,$data){
        $brand = Brand::find($id);
        if($brand){
            foreach($brand as $key => $value){
                $brand->{$key} = $value;
            }
            $brand->save();
        }
    }
}