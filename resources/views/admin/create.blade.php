@extends('layouts.app')

@push('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

@endpush

@section('content')

    @include('modal.notification')

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h5>Creación de nuevos Usuarios</h5>
                </div>
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Nombres:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ old('name') }}" required placeholder="Nombre...">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Apellidos:</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                        name="last_name" value="{{ old('last_name') }}" required placeholder="Apellidos...">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">E-mail:</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" value="{{ old('email') }}" required placeholder="E-mail...">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Teléfono:</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                        name="phone" value="{{ old('phone') }}" required placeholder="Teléfono...">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="">Dirección:</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                        name="address" value="{{ old('address') }}" required placeholder="Dirección...">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
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
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de nacimiento:</label>
                                    <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}" required placeholder="1994-04-12...">
                                        @error('date_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Rol:</label>
                                    <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id">
                                        <option selected="selected" disabled>Elegir</option>
                                        @forelse($roles as $value)
                                            <option value="{{$value->id}}"  @if(old('role_id') == $value->id) selected="selected" @endif>{{$value->name}}</option>
                                        @empty
                                            <option value="">No existen datos</option>
                                        @endforelse
                                    </select>
                                        @error('role_id')
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" charset="UTF-8"></script>
<script>
    $('#date_of_birth').datepicker({
        format: 'yyyy-mm-dd',
        language: 'es',
        autoclose: true
    });
</script>

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
