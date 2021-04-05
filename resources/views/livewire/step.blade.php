<div>
    <div class="flex justify-center pb-4 px-3">
        <h2 class="text-lg pb-4">Add steps for task</h2>
        <span wire:click="increment" class="fa fa-plus py-2 px-2 cursor-pointer" />
    </div>
    @foreach($steps as $step)
    <div class="py-2" wire:key="{{$step}}">
        <input type="text" name="step[]" class="py-1 px-2 border rounded" placeholder="{{'Describe step '.($step+1)}}">
        <span wire:click="remove({{$step}})" class="fas fa-times text-red-400 cursor-pointer"></span>
    </div>
    @endforeach

    

</div>
