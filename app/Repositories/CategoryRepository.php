<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{


    public function getAll()
    {
        return Category::query()->get();
    }

    public function getById($id)
    {
        return Category::find($id);
    }

    public function create($data)
    {
        return Category::create($data);
    }

    public function update($id, $data)
    {
        // save
        $category = Category::find($id);
        if ($category) {
            foreach ($data as $key => $value) {
                $category->{$key} = $value;
            }
            $category->save();
        }

        // update
        // return Category::query()->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return Category::destroy($id);
    }
}