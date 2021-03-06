@extends('layouts.app')


@section('content')

@if($errors->any())
<ul class="list-group mb-2 ">
    @foreach ($errors->all() as $error)
    <li class="list-group-item list-group-item-danger">{{$error}}</li>
    @endforeach
</ul>
@endif
@if (session()->has('error'))
            <li class="list-group-item list-group-item-danger mb-2">{{session()->get('error')}}</li>
@endif

<div class="card">
    <div class="card-header">
        {{isset($category) ? 'Edit Category':'Category'}}
    </div>
    <div class="card-body">
    <form action="{{isset($category) ? route('categories.update',$category->id) : route('categories.store')}}" method="POST">
        @csrf
        @isset($category)
          @method('PUT')
        @endisset
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{isset($category) ? $category->name : ''}}">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">{{isset($category) ? 'Update' : 'Add Category'}}</button>
            <a href="{{route('categories.index')}}" class="btn btn-warning btn-sm">Cancel</a>
    </div>
  </div>
@endsection
