@extends('layouts.app')

@push('css')

@endpush

@section('content')

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <div class="card-header">
                    <h5>Edición de Usuarios</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Nombres:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{$user->name}}" required placeholder="Nombre..." readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Apellidos:</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                    name="last_name" value="{{$user->last_name}}" required placeholder="Apellidos..." readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="">E-mail:</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{$user->email}}" required placeholder="E-mail..." readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="">Teléfono:</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                    name="phone" value="{{$user->phone}}" required placeholder="Teléfono..." readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="">Dirección:</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                    name="address" value="{{$user->address}}" required placeholder="Dirección..." readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento:</label>
                                <input type="text" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth"
                                    name="date_of_birth" value="{{$user->date_of_birth}}" required placeholder="1994-04-12..." readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="">Rol:</label>
                                    @foreach($role as $value)
                                        @if ($value->id === $user->role_id)
                                            <input type="text" class="form-control @error('role_id') is-invalid @enderror" id="role_id"
                                                name="date_of_birth" value="{{$value->name}}" required placeholder="1994-04-12..." readonly>
                                        @endif
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.index') }}" class="btn btn-primary" type="button">Regresar</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

@endpush
