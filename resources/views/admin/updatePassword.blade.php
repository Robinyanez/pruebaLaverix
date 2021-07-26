@extends('layouts.app')

@push('css')

@endpush

@section('content')

    @include('modal.notification')

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h5>Creación de nuevos Usuarios</h5>
                </div>
                <form action="{{ route('admin.update.password', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Contraseña:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                        name="password" required placeholder="Contraseña...">
                                        <div class="input-group-prepend">
                                            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon_password"></span> </button>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Confirmar Contraseña:</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password-confirm"
                                        name="password_confirmation" required placeholder="Contraseña...">
                                        <div class="input-group-prepend">
                                            <button id="show_password_confirm" class="btn btn-primary" type="button" onclick="mostrarPasswordConfirm()"> <span class="fa fa-eye-slash icon_password_confirm"></span> </button>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')

<script>

function mostrarPassword(){
    var cambio = document.getElementById("password");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon_password').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon_password').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

function mostrarPasswordConfirm(){
    var cambio = document.getElementById("password-confirm");
    if(cambio.type == "password"){
        cambio.type = "text";
        $('.icon_password_confirm').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon_password_confirm').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}
</script>

@endpush
