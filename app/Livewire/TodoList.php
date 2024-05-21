<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TodoList extends Component
{
    public string $description = '';
    public $toggleAll = false;

    #[Computed]
    public function todos()
    {
        return Todo::all();
    }

    public function getTodos(int $checkTodos)
    {
        // dd(Todo::where('done','=',$checkTodos)->get());
        Todo::where('done','=',$checkTodos)->get();
    }

    public function save(): void
    {
        Todo::create([
            'description' => $this->description,
            'done' => false,
        ]);
        
        $this->reset('description');
    }

    public function toggleTask(Todo $todo): void
    {
        $todo->update([
            'done' => !$todo->done,
        ]);
    }

    public function toggleAllTask(): void
    {
        Todo::query()->update([
            'done' => !$this->toggleAll,
        ]);
        $this->toggleAll = !$this->toggleAll;
    }

    public function destroyTask(Todo $todo): void
    {
        $todo->delete();
    }

    public function destroyAllTask(): void
    {
        Todo::where('done','=','1')->delete();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
