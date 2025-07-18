<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class TableComponent extends Component
{
    // use WithPagination;

    public string $model;
    public array $columns = [];
    public array $actions = [];
    public int $perPage = 5;

    // protected $paginationTheme = 'tailwind';

    public function mount($model,$columns = [], $actions = [])
    {
        $this->model = $model;
        $this->columns = $columns;
        $this->actions = $actions;
    }

    public function render()
    {
        $modelClass = $this->model;
        if(!class_exists($modelClass) || !is_subclass_of($modelClass,Model::class)){
            abort(500,'invalid model!');
        }
        $items = $modelClass::paginate($this->perPage);
        return view('livewire.table-component',['items'=>$items]);
    }
}
