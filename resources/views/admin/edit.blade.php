@extends('layouts.app')

@push('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

@endpush

@section('content')

    @include('modal.notification')

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h5>Edición de Usuarios</h5>
                </div>
                <form action="{{ route('admin.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Nombres:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{$user->name}}" required placeholder="Nombre...">
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
                                        name="last_name" value="{{$user->last_name}}" required placeholder="Apellidos...">
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
                                        name="email" value="{{$user->email}}" required placeholder="E-mail...">
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
                                        name="phone" value="{{$user->phone}}" required placeholder="Teléfono...">
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
                                        name="address" value="{{$user->address}}" required placeholder="Dirección...">
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
                                    <label for="">Fecha de nacimiento:</label>
                                    <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth"
                                        name="date_of_birth" value="{{$user->date_of_birth}}" required placeholder="1994-04-12...">
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
                                        @forelse($role as $value)
                                            @if ($value->id === $user->role_id)
                                                <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                            @else
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endif
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js" charset="UTF-8"></script>
<script>
    $('#date_of_birth').datepicker({
        format: 'yyyy-mm-dd',
        language: 'es',
        autoclose: true
    });
</script>

@endpush
