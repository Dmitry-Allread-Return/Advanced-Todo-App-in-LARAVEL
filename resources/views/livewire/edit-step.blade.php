<div>
    <div class="flex justify-center pb-4 px-3">
        <h2 class="text-lg pb-4">Add steps for task</h2>
        <span wire:click="increment" class="fa fa-plus py-2 px-2 cursor-pointer" />
    </div>
    @foreach($steps as $step)
    <div class="py-2" wire:key="{{$loop->index}}">
        <input type="text" name="stepName[]" class="py-1 px-2 border rounded" placeholder="{{'Describe step '.($loop->index+1)}}" value="{{$step['name'] ?? ''}}">
        <input type="hidden" name="stepId[]" value="{{$step['id'] ?? ''}}">
        <span wire:click="remove({{$loop->index}})" class="fas fa-times text-red-400 cursor-pointer"></span>
    </div>
    @endforeach

    

</div>
