@csrf

<label for="title">Name Category : </label>
<input name="title" id="title" type="text" class="form-control" value="{{ old('title', $category->title) }}">

