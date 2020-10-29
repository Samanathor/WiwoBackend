<?php

namespace App\Http\Livewire\Categorias;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $search = "";
    public $perPage = 10;
    public $sortAsc = true;
    public $sortField = "nombre";

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
    public function clear()
    {
        $this->search = "";
    }

    public function enable($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->activo = true;
        $categoria->save();
    }
    public function disable($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->activo = false;
        $categoria->save();
    }
    public function delete($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
    }
    public function render()
    {
        return view('livewire.categorias.table', [
            'categorias' => Categoria::search($this->search)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate($this->perPage)
        ]);
    }
}
