@extends('layouts.app')

@push('css')

    @livewireStyles

@endpush

@section('content')

    <div class="container">

        <section class="conten">
            <h1>Panel Usuarios</h1>
        </section>

        <br>

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Listado de Usuarios</h3>
                        @if (Auth::user()->role_id == 1)
                            <a href="{{ route("admin.create") }}" type="button" class="btn btn-primary float-sm-right ml-2">
                                Registrar nuevo Usuario
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            @livewire('tables.table-user')

        </div>

    </div>

@endsection

@push('js')

    @livewireScripts

@endpush