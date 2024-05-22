<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Computed;
use Livewire\Component;

class TodoList extends Component
{
    public string $description = '';

    public $toggleAll = false;

    public ?string $filter = '';

    #[Computed]
    public function todos()
    {
        return Todo::when(
            $this->filter,
            fn ($query) => $query->where('done', $this->filter == 'completed')
        )
        ->get();
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
