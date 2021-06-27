@csrf
    
<label for="title">Título </label>
<input name="title" id="title" type="text" class="form-control" value="{{ old('title', $book->title) }}">
<label for="age">Año</label>
<input name="age" id="age" type="numeric" class="form-control" value="{{ old('age', $book->age) }}">
<label for="cantidad">Cantidad</label>
<input name="cantidad" id="cantidad" type="numeric" class="form-control" value="{{ old('cantidad', $book->cantidad) }}">
<label for="precio">Precio</label>
<input name="precio" id="precio" type="numeric" class="form-control" value="{{ old('precio', $book->precio) }}">
<label for ="category_id">Categoria</label>
<select class="form-control" name="category_id" id="category_id">
    @foreach ($categories as $title => $id)

        <option {{$book->category_id == $id ? 'Selected':''}} value="{{$id}}">{{$title}}</option>
        
    @endforeach
</select>

<label for="description">Descripcion</label>
    <textarea id="description" name="description" class="form-control">
        {{ old('description', $book->description) }}
    </textarea>

<label class="col-md-6"for="imagen">Foto Portada Libro</label>
<!--<div class="col-md-6">-->
    {{$book->imagen}}
    <input id="imagen" type="file" name="imagen" class="form-control" value="{{old('imagen',$book->imagen)}}">