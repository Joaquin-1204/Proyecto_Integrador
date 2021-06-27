@extends('dashboard.usernav')

@section('content')

    <div class="card mt-4">
        <div class="card-header" style="text-align: center; font-size:25px">
            List  Books
        </div>
        <div class="card-body">

        <a class="text-white btn btn-success my-2" href="{{route('book.create')}}"><i class="fa fa-plus"></i> Create Book</a>

            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Title</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Age Public</th>
                        <th>Options</th>
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($books as $b)
                        <tr>
                            
                            <td>{{ $b->title }}</td>
                            <td>{{ $b->cantidad}}</td>
                            <td>{{ $b->precio}}</td>
                            <td>{{ $b->age }}</td>
                            
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('book.edit', $b->_id) }}"><i
                                        class="fa fa-edit text-white"></i></a>
                                <a data-id="{{ $b->_id }}" data-title="{{ $b->title }}" class="btn btn-sm btn-danger"
                                    href="#" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container" style="text-align: center; margin-right: -40%;">
            {{ $books->links() }}
        </div>
    </div>






    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete: <span></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    
                Are you sure you want to delete the selected record?

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <form id="formDelete" data-action="{{ route('book.destroy', 0) }}"
                        action="{{ route('book.destroy', 0) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>


                </div>
            </div>
        </div>
    </div>


    <script>
        var deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget

            // Extract info from data-* attributes
            var id = button.getAttribute('data-id')
            var title = button.getAttribute('data-title')

            // form 
            var action = document.getElementById('formDelete').getAttribute('data-action')
            action = action.slice(0, -1)
            document.getElementById('formDelete').setAttribute('action', action + id)

            // Update the modal's content.
            var modalTitle = deleteModal.querySelector('.modal-title span')

            modalTitle.textContent = title
        })

    </script>

@endsection
