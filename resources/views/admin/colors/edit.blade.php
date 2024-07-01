@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Edit Color</h1>
    <form action="{{ route('admin.colors.update', $color) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $color->name }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="number" class="form-control" id="status" name="status" value="{{ $color->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
