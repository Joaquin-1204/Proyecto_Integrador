@extends('dashboard.usernav')

@section('content')

    <div class="card mt-4">
        <div class="card-header" style="text-align: center; font-size:25px">
            List Clients
        </div>
        <div class="card-body">

        

            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Option</th>
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $b)
                        <tr>
                            
                            <td>{{ $b->name }}</td>
                            <td>{{ $b->lastname}}</td>
                            <td>{{ $b->email}}</td>
                            <td>{{ $b->address}}</td>
                            <td>{{ $b->phone }}</td>
                            <td>
                                <a class="btn btn-sm btn-success" href="{{ route('client.edit', $b->_id) }}"><i
                                class="fa fa-edit text-white"></i></a>
                            </td>
                                                       
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>






    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar: <span></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    ¿Seguro que quieres eliminar el registro seleccionado?

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
