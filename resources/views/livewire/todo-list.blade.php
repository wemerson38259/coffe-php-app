<div class="flex flex-col min-h-screen min-w-full items-center bg-gray-200">
    <div class="bg-white rounded-xl mt-5 boder-2 boder-black gap-3 p-10">
        <h1 class="text-[#b83f45] text-7xl font-extralight p-5 text-center">TODO LIST</h1>
        <div >
            <form wire:submit="save" class="flex flex-row gap-2">
                <input class="flex-1 min-h-16 border-2 boder-black rounded-xl" placeholder="digit your task here..." type="text" wire:model="description">
                <button class="text-white bg-green-700 hover:bg-green-800 h-16 w-16 rounded-xl border-2 border-green-900" type="submit">Save</button>
            </form>
        </div>
        <div>
            <main>
                @foreach($this->todos as $todo)
                    <div wire:key="{{ $todo->id }}" class="mt-2  border-2 border-gray-300 rounded-xl min-h-16 flex flex-row justify-between items-center">
                        <div class="flex-1 flex justify-start items-center min-h-16">
                            <span 
                                wire:click="toggleTask({{ $todo->id }})"  
                                @class([
                                    "m-2 rounded-full border-2 border-gray-200 hover:border-green-400 min-h-7 min-w-7 text-center",
                                    "border-green-400" => $todo->done
                                ])
                            >
                                {{ $todo->done? 'V' : '' }}
                            </span>  
                            <span
                            @class([
                                "text-wrap basis-1/3",
                                "line-through" => $todo->done
                            ])>
                                {{ $todo->description }}
                            </span>
                        </div>
                        <span wire:click="destroyTask({{ $todo->id }})" class="m-2 text-red-500 font-bold">X</span>
                    </div>
                @endforeach
            </main>
            <footer class="flex flex-col gap-3">
                <span class=""><b>{{ count($this->todos) }}</b> item{{count($this->todos) > 1? 's' : '' }} left!</span>
                <div class="flex flex-row justify-between">
                    <button class="text-white bg-gray-500 hover:bg-gray-400 h-10 w-16 rounded-xl border-2 border-gray-600">All</button>
                    <button class="text-white bg-gray-500 hover:bg-gray-400 h-10 w-16 rounded-xl border-2 border-gray-600">Active</button>
                    <button class="text-white bg-gray-500 hover:bg-gray-400 h-10 w-22 rounded-xl border-2 border-gray-600">Completed</button>
                </div>
                <button class="text-white bg-red-500 hover:bg-red-400 h-10 rounded-xl border-2 border-red-500">Clear Completed</button>
            </footer>
        </div>
    </div>
</div>
