@extends('layouts.app')
@section('title', 'Category')
@section('content')
<div class="container-fluid">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit</h3>
        </div>
        <form action="{{route('categories.update', $category['id'])}}" method="POST">
            @csrf
            <input type='hidden' name='id' value="{{$category['id']}}"/>
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name='name' placeholder="Enter name" value="{{ old('name', $category['name']) }}" />
                    @error('name')
                        <span class="error invalid-feedback" role="alert">{{ $errors->first('name') }}</span>
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
