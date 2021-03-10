{!! Form::model($model, [
    'route' => ['hak_akses.update',$model->id],
    'method' =>'PUT',
    'id' => 'form_edit'
]) !!}

    @foreach($list_akses as $akses)
        @if($akses.kategori != $akses.kategori)
            <h1>Beda</h1>
        @endif
        <div class="col-3 mb-2 input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <input type="checkbox" name="list_akses[]" value="{{ $akses->id }}" aria-label="Checkbox for following text input">
                </div>
            </div>
            <p class="form-control">{{ $akses->nama }} {{$loop->index}}</p>
        </div>
    @endforeach

{!! Form::close() !!}