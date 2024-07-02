@extends('admin.layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
<h1>Edit Category</h1>
<form action="{{ route('admin.bills.update', $category) }}"
    method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="category_name">Name</label>
        <input type="text"
            class="form-control"
            id="category_name"
            name="category_name"
            value="{{ $category->category_name }}"
            required>
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text"
            class="form-control"
            id="slug"
            name="slug"
            value="{{ $category->slug }}"
            required>
    </div>
    <div class="form-group">
        <label for="category_status">Status</label>
        <select class="form-control"
            id="category_status"
            name="category_status"
            required>
            <option value="1"
                {{ $category->category_status ? 'selected' : '' }}>Active</option>
            <option value="0"
                {{ !$category->category_status ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <button type="submit"
        class="btn btn-primary">Save</button>
</form>
@endsection