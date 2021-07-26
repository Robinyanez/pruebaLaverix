<div class="card-body">
    <div class="row mb-3">
        <div class="col-sm-10">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar por Nombres y/o Apellidos..." wire:model="search">
                <div class="input-group-append">
                    @if ($search !== '')
                        <div class="card">
                            <button wire:click="clearTable" class="form-control"><i class="fas fa-times"></i></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <select class="outline-none form-control" wire:model="perPage">
                <option value="5">5 por página</option>
                <option value="10">10 por página</option>
                <option value="15">15 por página</option>
                <option value="25">25 por página</option>
                <option value="50">50 por página</option>
                <option value="100">100 por página</option>
            </select>
        </div>
    </div>
    @if ($userQuery->count())
        <table class="table" id="table_user">
            <thead>
                <tr>
                    <th scope="col" wire:click="sortByTable('id')">#
                        @if ($sortDirection !== 'asc' && $sortField == 'id')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('name')">Nombres
                        @if ($sortDirection !== 'asc' && $sortField == 'name')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('last_name')">Apellidos
                        @if ($sortDirection !== 'asc' && $sortField == 'last_name')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('phone')">Teléfono
                        @if ($sortDirection !== 'asc' && $sortField == 'phone')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('address')">Dirección
                        @if ($sortDirection !== 'asc' && $sortField == 'address')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('date_of_birth')">F. Nacimiento
                        @if ($sortDirection !== 'asc' && $sortField == 'date_of_birth')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('email')">E-mail
                        @if ($sortDirection !== 'asc' && $sortField == 'email')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    <th scope="col" wire:click="sortByTable('role')">Rol
                        @if ($sortDirection !== 'asc' && $sortField == 'role')
                            <i class="fas fa-sort-amount-up"></i>
                        @else
                            <i class="fas fa-sort-amount-up-alt"></i>
                        @endif
                    </th>
                    @if (Auth::user()->role_id == 1)
                        <th scope="col">Opciones</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($userQuery as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->date_of_birth}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        @if (Auth::user()->role_id == 1)
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-cogs"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route("admin.show", $user->id) }}"><i class="fas fa-eye"></i> Ver</a>
                                        <a class="dropdown-item" href="{{ route("admin.edit", $user->id) }}"><i class="fas fa-user-edit"></i> Editar</a>
                                        {{-- <a class="dropdown-item" href="{{ route("admin.destroy", $user->id) }}"><i class="fas fa-trash"></i> Eliminar</a> --}}
                                        <a class="dropdown-item" data-username="{{ $user->name }}" data-userid="{{ $user->id }}" onclick="confirmDeleteUser(this)"  data-toggle="modal" data-backdrop="static" data-target="#exampleModalDeleteUser">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route("admin.update.password.view", $user->id) }}"><i class="fas fa-unlock-alt"></i> Cambiar Contraseña</a>
                                    </div>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        @include('modal.deleteUser')

        <div class="container text-center d-flex justify-content-center align-items-center m-3">
            {{ $userQuery->links() }}
        </div>
    @else
        <div class="container">
            No hay resultados para la busqueda "{{ $search }}" en la página {{ $page }} al mostrar {{ $perPage }} por pagina.
        </div>
    @endif
</div>
