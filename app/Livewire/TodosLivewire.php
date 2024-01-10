<?php

namespace App\Livewire;

use Livewire\Attributes\Validate; 
use Livewire\Component;
use App\Models\Todos;

class TodosLivewire extends Component
{
    public $todos = [];

    public $temp_id = null;

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

        $this->render();
    }

    public function read($id)
    {
        Todos::where('id', $id)->update([
            "is_completed" => 1
        ]);

        $this->render();
    }

    public function delete($id)
    {
        Todos::where('id', $id)->delete();

        $this->render();
    }

    public function render()
    {
        $this->todos = Todos::orderBy('created_at', 'desc')->get();

        return view('livewire.todos', $this->todos);
    }

}
