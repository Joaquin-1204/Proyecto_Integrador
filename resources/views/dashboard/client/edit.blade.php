@extends('dashboard.usernav')

@section('content')

    <div class="card mt-4">
        <div class="card-header">
            Editar Cliente: {{ $user->name }}
        </div>
        <div class="card-body">

            @include('dashboard.partials.errors-form')

            <form action="{{ route('client.update',$user->_id) }}" method="post">
                @method('PUT')
                @include('dashboard.client._edit')

                <!-- pendiente como actualizar la foto de la portada del libro-->
                
                <input type="submit" value="Actualizar" class="mt-3 btn btn-success">

            </form>

        </div>
    </div>

@endsection
