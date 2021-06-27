@extends('dashboard.usernav')

@section('content')

    <div class="card mt-4">
        <div class="card-header">
            Book Create
        </div>
        <div class="card-body">

            @include('dashboard.partials.errors-form')

            <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">

                @include('dashboard.book._form')
              
                <input type="submit" value="Send" class="mt-3 btn btn-success">
                <input type="button" class="mt-3 btn btn-danger" onclick="history.back()" name="volver atrás" value="Go Back">

            </form>

        </div>
    </div>

@endsection