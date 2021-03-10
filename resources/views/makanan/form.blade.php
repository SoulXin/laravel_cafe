{!! Form::model($model, [
    'route' => $model->exists ? ['makanan.update',$model->id] : 'makanan.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
    <div class="form-group">
        <label for="" class="control-label">Nama Makanan</label>
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'nama', 'autocomplete' => 'off']) !!}
    </div>

    <div class="form-group">
        <label for="" class="control-label">harga Makanan</label>
        {!! Form::text('harga', null, ['class' => 'form-control', 'id' => 'harga', 'autocomplete' => 'off']) !!}
    </div>

    <button type="submit" class="btn btn-success">
        Tambah
    </button>

{!! Form::close() !!}