<?php
use App\Models\Category;
$categories = Category::all();
?>

@extends('layout.master')

@section('content')
<div class="col-md-6 offset-md-3">
    <div class="d-flex flex-row justify-content-between mt-2">
        <h3>List items</h3>
    
        <a href="/item/create">
            <button type="button" class="btn btn-sm btn-success">Create item</button>
        </a>
    </div>

    <form method="get">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <select name="category_id" class="form-control" onchange="ItemList.changeCategory(this)" value={{ request()->category_id }}>
                        <option value="">[Filter by category]</option>
                        @foreach($categories as $category)
                        <option {{ !is_null(request()->category_id) && request()->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>

    <div class="col-md-12">
        @if($items->isEmpty())
        0 {{ __('result') }}
        @else
        {{ __('pagination.records_of_total', ['first' => $items->firstItem(), 'last' => $items->lastItem(), 'total' => $items->total()]) }}
        @endif
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th class="text-right">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($items->isEmpty())
            <tr>
                <td colspan="100" class="text-center">No data found</td>
            </tr>
            @else
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td class="text-right">
                    <a href="/item/{{ $item->id }}/edit" class="btn btn-sm btn-link">Edit</a>
                    <span>
                        <button class="btn btn-sm btn-link" onclick="ItemList.deleteItem({{ $item->id }})">Delete</button>
                    </span>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>

    <div class="d-flex flex-row justify-content-center">
        <nav>{{ $items->appends(request()->query())->links('layout.pagination') }}</nav>
    </div>
</div>
@stop

@push('js')
<script type="text/javascript">
    var ItemList = new App.Item.List;
</script>
@endpush