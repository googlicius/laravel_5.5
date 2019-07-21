<?php
use App\Models\Category;
$categories = Category::all();

if(old()) {
    $item->fill(old());
}
?>

@extends('layout.master')

@section('content')
<div class="col-md-6 offset-md-3">
    <form action="/item{{ $item->exists ? '/' . $item->id : NULL }}" method="post">
        {{csrf_field()}}

        @if($item->exists)
        <input type="hidden" name="id" value="{{ $item->id }}">
        {{ method_field('PUT') }}
        @endif

        <div class="d-flex flex-row justify-content-between mt-2">
            <h3>Create item</h3>
        
            <span>
                <button type="submit" class="btn btn-sm btn-success">Save</button>

                <button type="submit" class="btn btn-sm">Cancel</button>
            </span>
        </div>

        <div class="form-group">
            <label>Title</label>
            <input name="title" type="text" class="form-control" placeholder="Title" value="{{ $item->title }}">
            @if($errors->has('title'))
            <small class="form-text text-danger">{{$errors->first('title')}}</small>
            @endif
        </div>

        <div class="form-group">
            <label>Link</label>
            <input name="link" type="text" class="form-control" placeholder="Link" value="{{ $item->link }}">
        </div>

        <div class="form-group">
            <label>Category</label>
            <div class="row">
                <div class="col-md-8">
                    <select name="category_id" class="form-control" value="{{ $item->category_id }}">
                        <option value="">[Select category]</option>
                        @foreach($categories as $category)
                        <option {{ !is_null($item->category_id) && $category->id === $item->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="decription" placeholder="Description" class="form-control" cols="30" rows="10">{{ $item->description }}</textarea>
        </div>

        <div class="d-flex flex-row-reverse mt-2">
            <span>
                <button type="submit" class="btn btn-sm btn-success">Save</button>
                <button type="submit" class="btn btn-sm">Cancel</button>
            </span>
        </div>
    </form>
</div>
@stop