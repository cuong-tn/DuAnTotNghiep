<!-- resources/views/admin/fabrics/edit.blade.php -->

@extends('admin.layouts.master')

@section('title', 'Edit Fabric')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Fabric</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.fabrics.update', $fabric->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="fabric">Fabric</label>
                    <input type="text" class="form-control" id="fabric" name="fabric" value="{{ $fabric->fabric }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
