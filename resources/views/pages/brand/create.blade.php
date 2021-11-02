@extends('layouts.app')
@section('title', 'Brand')
@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Create brand</h3>
        </div>
        <form action="{{route('brands.create')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name='name' placeholder="Enter name"/>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name='image' accept="image/*"/>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection