<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TodoList extends Component
{
    public string $description = '';

    #[Computed]
    public function todos()
    {
        return Todo::all();
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

    public function destroyTask(Todo $todo): void
    {
        $todo->delete();
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
