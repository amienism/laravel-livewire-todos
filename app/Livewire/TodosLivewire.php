<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Attributes\Validate; 
use Livewire\Component;
use App\Models\Todos;

class TodosLivewire extends Component
{
    public $todos = [];

    public $temp_id = null;

    #[Url]
    public $search = null;

    #[Validate('required')] 
    public $todo_name = "";

    #[Validate('required')] 
    public $is_completed = false;

    public function save()
    {
        $this->validate();    

        Todos::create(
            $this->only(['todo_name', 'is_completed'])
        );

        $this->todo_name = '';
        $this->is_completed = false;
    }

    public function read($id)
    {
        Todos::where('id', $id)->update([
            "is_completed" => 1
        ]);
    }

    public function delete($id)
    {
        Todos::where('id', $id)->delete();
    }

    public function render()
    {
        $this->todos = Todos::orderBy('created_at', 'desc');

        $search = $this->search;

        $this->todos->when($this->search, function ($query) use ($search) {
            return $query->where('todo_name', 'LIKE', '%'.$search.'%');
        });

        $this->todos = $this->todos->get();

        return view('livewire.todos', $this->todos);
    }

}
