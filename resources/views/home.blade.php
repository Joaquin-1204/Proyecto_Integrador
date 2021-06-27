@extends('dashboard.master')

@section('content')
<div class="col-md-4 pt-3">
    <form action="search" method="GET">
        <div class="input-group">
            <input type="search" name="search" class="form-control">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary">Search</button>
            </span>
        </div>
    </form>
</div>
        

<div class="container" style="margin-left: -12%;">
    
<div class="modal-body row" style="margin-right:-20%">
    
    <div class="col-7 sm-8">
        <div class="card text-center ">
            <div class="card-header text-center">
                List Books
            </div>
            <div class="container ">        
                <div class="row">
    <!--                    <div class="card-deck">-->
                            
                    @foreach ($books as $b)
                    
                    <div class="col-sm" style="display:flex;">   
                    
                        <div class="card-group mt-3 ">
                    
                        <div class="card text-center border-info"style="width: 300px;">
                            <div class="card-body">
                                <img src="{{ asset( $b->imagen)}}" class="card-img-top" style="width: 150px; height: 200px; border: 1px solid skyblue">
                                <h5 class="card-title text-center">Tittle: {{ $b->title }}</h5>
                                <h5 class="card-title text-center">Stock: {{ $b->cantidad }}</h5>
                                <h5 class="card-title text-center">Age: {{ $b->age }}</h5>
                                <h5 class="card-title text-center">Price: ${{ $b->precio }}</h5>
                                
                                @csrf
                                <form action="{{route('cart.add')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{$b->_id}}">
                                    <!--<input type="submit" name="btn"  class="btn btn-success">-->
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart text-white"></i></button>
                                    
                                </form>
                            </div>
                        
                        </div>          
                        
                        </div>
                    </div>  
                        
                    @endforeach
                   
                </div>
               
            </div>
        </div>
        
    </div>
    <div class="col-4">
        <div class="card" style="width: 15cm; margin-left: -5%;">
            <div class="card-header text-center">
                Shopping Cart
            </div>

            <div class="card-body text-center border-info">
                <div class="container">
                    <div class="row">
                       <div class="col-sm-12 bg-light">
                           @if (count(Cart::getContent()))
                            <table class="table table-dark">
                                <thead>
                                    
                                    <th>NOMBRE</th>
                                    <th>PRECIO</th>
                                    <th>CANTIDAD</th>
                                    <th>OPCIONES</th>
                                </thead>
                                <tbody>
                                    @foreach (Cart::getContent() as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->quantity}}</td>
                                            <td>
                                                <form action="{{route('cart.removeitem')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt text-white"></i></button>
                                                    
                                                </form> 
                                                                                                 
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                                
                            </table>

                                <a class="text-white btn btn-info my-2" href="{{route('carrito.confirmar')}}"> Confirmar</a>
                                <a class="text-white btn btn-danger my-2" href="{{route('cart.clear')}}"><i class="fa fa-minus"></i> Vaciar</a>

                            @else
                                <p>Empty Cart</p>
                           @endif
                
                       </div>
                       
                    </div>
                </div>
            </div>
            <div class="container">

            <!--<a class="text-white btn btn-success my-2" href="{{route('book.create')}}"><i class="fa fa-plus"></i> Crear</a>-->
            
            
                
                    
            </div>
        </div>
    </div>
</div>
<div class="container" style="text-align: center; margin-right: -24%;">
    {{ $books->links() }}
</div>

        

</div>
@endsection

