<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use Livewire\WithPagination;
use DB;

class TableUser extends Component
{

    use WithPagination;

    protected $queryString = [
        'search'            => ['except' => ''],
        'perPage'           => ['except' => 5],
        'sortField'         => ['except' => 'id'],
        'sortDirection'     => ['except' => 'asc'],
    ];

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $perPage = 5;
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public function sortByTable($field){

        $this->sortField = $field;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function clearTable(){

        $this->search = '';
        $this->page = 1;
        $this->perPage = 5;
    }

    public function render()
    {
        $userQuery = DB::table('users as u')
                                ->select('u.id','u.name','u.last_name','u.phone','u.address','u.date_of_birth','u.email','r.name as role')
                                ->join('roles as r','u.role_id','=','r.id')
                                ->where('u.name','LIKE',"%{$this->search}%")
                                ->orWhere('u.last_name','LIKE',"%{$this->search}%")
                                ->orderBy($this->sortField, $this->sortDirection)
                                ->paginate($this->perPage);

        return view('livewire.tables.table-user',compact('userQuery'));
    }
}
