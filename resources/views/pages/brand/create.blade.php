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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' placeholder="Enter name"/>
                    @error('name')
                        <span class="error invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input class="@error('name') is-invalid @enderror" type="file" name='image' accept="image/*"/>
                    @error('image')
                        <span class="error invalid-feedback" role="alert">{{ $errors->first('image') }}</span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection