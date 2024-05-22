<div class="flex flex-col min-h-screen min-w-full items-center bg-gray-200">
        
        <h1 class="text-[#b83f45] text-7xl  p-5 text-center">TODO LIST</h1>
        <div class="w-2/5 bg-white rounded-xl mt-5 boder-2 boder-black gap-3">
        <div >
            <form wire:submit="save" class="flex flex-row">
                <div wire:click="toggleAllTask"  class="rounded-tl-xl w-11 hover:bg-gray-200 m-0 flex justify-center items-center hover:border-2 hover:border-red-300">
                <x-ri-arrow-down-s-line 
                    @class([
                        "text-gray-400 h-10 w-10",
                        "text-gray-700" => $this->toggleAll
                    ])
                /> 
                </div>
                <div class="flex-1 flex ">
                    <input class="flex-1 min-h-16 rounded-xl outline-none" placeholder="What needs to be done?" type="text" wire:model="description">
                </div>                
            </form>
        </div>
        <div>
            <main>
                @foreach($this->todos as $todo)
                    <div wire:key="{{ $todo->id }}" class="border-y-2 border-gray-300 min-h-16 flex flex-row justify-between items-center">
                        <div class="flex-1 flex flex-row justify-start items-center">
                            <div 
                                wire:click="toggleTask({{ $todo->id }})"  
                                @class([
                                    "m-2 text-emerald-500 rounded-full border-2 border-gray-200 hover:border-green-400 min-h-7 min-w-7 text-center",
                                    "border-green-300 " => $todo->done,
                                ])
                            >
                                {{ $todo->done? svg('entypo-check') : '' }}
                            </div>  
                            <div
                            @class([
                                "text-wrap grow-0",
                                "line-through" => $todo->done
                            ])>
                                {{ $todo->description }}
                            </div>
                        </div>
                        <div wire:click="destroyTask({{ $todo->id }})" class="m-2 text-red-500 font-bold">X</div>
                    </div>
                @endforeach
            </main>
            <footer class="flex flex-col gap-3 m-1">
                
                <div class="flex flex-row justify-between m-2">
                    <div>
                        <span class=""><b>{{ count($this->todos) }}</b> item{{count($this->todos) > 1? 's' : '' }} left!</span>
                    </div>
                    <div class="flex gap-4">
                        <button class="underline underline-offset-2" wire:click="$set('filter', '')">All</button>
                        <button class="underline underline-offset-2" wire:click="$set('filter', 'active')">Active</button>
                        <button class="underline underline-offset-2" wire:click="$set('filter', 'completed')">Completed</button>                        
                    </div>
                </div>
                <button wire:click="destroyAllTask" class="text-white bg-red-500 hover:bg-red-400 h-10 rounded-xl border-2 border-red-500">Clear Completed</button>
            </footer>
        </div>
    </div>
</div>
