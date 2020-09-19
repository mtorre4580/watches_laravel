<div class="d-flex">
    <div class="form-edit-content-left-fan-watches">
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" value="{{ old('titulo', $noticia->titulo) }}">
            <p class="text-muted">El título es obligatorio y debe tener un mínimo de 3 carácteres</p>
            @if($errors->has('titulo'))
                <div class="alert alert-danger my-2">{{ $errors->first('titulo') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="id_categoria">Categoría</label>
            <select id="id_categoria" name="id_categoria" class="form-control">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categoria }}" @if(old('id_categoria', $noticia->id_categoria) == $categoria->id_categoria) selected @endif>
                        {{ $categoria->descripcion }}
                    </option>
                @endforeach
            </select>
            @if($errors->has('id_categoria'))
                <div class="alert alert-danger my-2">{{ $errors->first('id_categoria') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="contenido">Contenido</label>
            <textarea name="contenido" id="contenido" rows="10" class="form-control">{{ old('contenido', $noticia->contenido) }}</textarea>
            <p class="text-muted">El contenido es obligatorio y debe tener un mínimo de 40 carácteres</p>
        </div>
        @if($errors->has('contenido'))
            <div class="alert alert-danger">{{ $errors->first('contenido') }}</div>
        @endif
        <button type="submit" class="btn btn-success my-2">Aceptar</button>
    </div>
    <div class="d-flex flex-wrap align-items-center container-form-edit-image">
        <img class="img-fluid rounded" src="/images/{{$noticia->imagen}}" alt="{{ $noticia->titulo }}">
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="imagen" id="imagen">
                <label class="custom-file-label" for="imagen">Subir imagen</label>
            </div>
        </div>
    </div>
</div>