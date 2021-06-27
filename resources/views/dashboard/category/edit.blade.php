@extends('dashboard.master')

@section('content')

    <div class="card mt-4">
        <div class="card-header">
            Edit Category : {{ $category->title }}
        </div>
        <div class="card-body">

            @include('dashboard.partials.errors-form')

            <form action="{{ route('category.update',$category->_id) }}" method="post">
                @method('PUT')
                @include('dashboard.category._form')
                <input type="submit" value="Update" class="mt-3 btn btn-success">
                <input type="button" class="mt-3 btn btn-danger" onclick="history.back()" name="volver atrás" value="Go Back">

            </form>

        </div>
    </div>

@endsection
