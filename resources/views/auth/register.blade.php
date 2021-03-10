<div class="row justify-content-center">
    <div class="col-4 border rounded p-3">

        <form method="POST" action="{{ route('register') }}" id="idForm">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                <div class="col-lg-8">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    <span class="text-danger">
                        <strong id="name-error"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                <div class="col-lg-8">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username">

                    <span class="text-danger">
                        <strong id="username-error"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-lg-8">
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

                    <span class="text-danger">
                        <strong id="password-error"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Ulangi Password') }}</label>

                <div class="col-lg-8">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    
                    <span class="text-danger">
                        <strong id="password-confirm-error"></strong>
                    </span>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="ml-auto mr-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Tambah') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        const render_header = $('#render_header');
        render_header.html('{{ $nama_container }}');

        // Form
        $("#idForm").submit(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                beforeSend: function(){
                    // Bersihkan error
                    $( '#name-error').html('');
                    $( '#username-error').html('');
                    $( '#password-error').html('');
                    $( '#password-confirm-error').html('');

                    // Hilangkan class
                    $('#name').removeClass('is-invalid');
                    $('#username').removeClass('is-invalid');
                    $('#password').removeClass('is-invalid');
                    $('#password-confirm').removeClass('is-invalid');
                },
                success: function(data){
                    document.getElementById("idForm").reset();
                    swal("Berhasil !", "Akun Berhasil Ditambahkan", "success");
                },error: function(data){
                    var err = data.responseJSON;
                    if(err.errors.name){
                        $('#name-error').html( err.errors.name[0] );
                        $('#name').addClass('is-invalid');
                    }
                    else if(err.errors.username){
                        $('#username-error').html( err.errors.username[0] );
                        $('#username').addClass('is-invalid');
                    }else if(err.errors.password){
                        $('#password-error').html( err.errors.password[0] );
                        $('#password-confirm-error').html( err.errors.password[0] );
                        $('#password').addClass('is-invalid');
                        $('#password-confirm').addClass('is-invalid');
                    }
                    swal("Gagal !", "Terdapat Kesalahan Dalam Memasukan Data", "error");
                }
            });
        });
    })


    
</script>