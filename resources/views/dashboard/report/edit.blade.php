@extends('dashboard.usernav')

@section('content')

    <div class="card mt-4">
        <div class="card-header">
            Editar libro: {{ $book->title }}
        </div>
        <div class="card-body">

            @include('dashboard.partials.errors-form')

            <form action="{{ route('book.update',$book->_id) }}" method="post">
                @method('PUT')
                @include('dashboard.book._edit')

                <!-- pendiente como actualizar la foto de la portada del libro-->
                
                <input type="submit" value="Actualizar" class="mt-3 btn btn-success">

            </form>

        </div>
    </div>

@endsection
