@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Sizes</h2>
                <a class="btn btn-success" href="{{ route('admin.sizes.create') }}">Create New Size</a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Size Name</th>
                <th width="280px">Action</th>
            </tr>
            @php
                $i = 0; // Khai báo và gán giá trị ban đầu cho biến $i
            @endphp
            @foreach ($sizes as $size)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $size->name }}</td>
                    <td>
                        <form action="{{ route('admin.sizes.destroy',$size->id) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('admin.sizes.edit',$size->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

{{--        {!! $sizes->links() !!}--}}
    </div>
@endsection
