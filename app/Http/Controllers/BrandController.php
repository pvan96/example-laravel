<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Repositories\Brandrepository;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function index()
    {
        $brands = $this->brandRepository->getAll();
        return view('pages.brand.index', compact('brands'));
    }

    public function viewCreate(){
        return view('pages.brand.create');
    }
    public function create(BrandRequest $request)
    {
        $data = $request->only(
            [
                'name',
                'image'
            ]
        );
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file->move('uploads', $file->getClientOriginalName());
            $data['image'] = 'uploads/'.$file->getClientOriginalName();
            //dd( $data['image']);die;
        }
        $this->brandRepository->create($data);
        return redirect()->route('brands.list');
    }

  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function viewEdit(Request $request)
    {
        $id = $request->id;
        $brand = $this->brandRepository->getById($id);
        return view('pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
