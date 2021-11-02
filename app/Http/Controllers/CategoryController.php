<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;


class CategoryController extends Controller
{
    protected $categoryRepository;

    // depedency injection
    // type-hint
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('pages.category.index', compact('categories'));
    }

    public function viewCreate()
    {
        return view('pages.category.create');
    }

    public function create(CategoryRequest $request)
    {
        $data = $request->all();
        $this->categoryRepository->create($data);
        return redirect()->route('categories.list');
    }

    public function viewEdit(Request $request)
    {
        $id = $request->id;
        $category = $this->categoryRepository->getById($id);
        return view('pages.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request)
    {
        $id = $request->id;
        $data = $request->only([
            'name'
        ]);
        $this->categoryRepository->update($id, $data);
        return redirect()->route('categories.list');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $this->categoryRepository->delete($id);
        return redirect()->route('categories.list');
    }
}
