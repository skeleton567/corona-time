@props(['name', 'type'=> 'text', 'placeholder' => '', 'label' => $name])

<div class="text-xs lg:text-lg mt-6 mb-0">
    <label class="mb-2 font-semibold" for="{{$name}}">{{ucwords($label)}}</label>
    <input type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{old($name)}}" placeholder="{{$placeholder}}"
    class="appearance-none block w-full px-6 py-4 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none">
    <div class="mt-2">
        @error($name)
        <p class="text-gray-400 text-sm">{{$message}}</p> 
     @enderror
    </div>
   
</div>