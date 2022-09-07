@props(['name'])

<th {{$attributes->merge(['class'=>"text-xs lg:text-sm pl-2 w-22 md:w-80 relative md:pl-10 text-left"])}}>
    <span class="relative">{{$slot}}<span class="text-gray-100">hf.</span> 
    <button name="{{$name}}" value="true" class="absolute top-[0.2rem] right-0 md:top-1 md:right-0"><img class="{{request()->query($name) === 'true' ? 'filter brightness-0' : ''}}"  src="images/sroll-arrow.svg" alt=""></button>
    <button name="{{$name}}" value="false" class="absolute top-[0.4rem] right-0 md:top-2 md:right-0 rotate-180 mt-1"><img class="{{request()->query($name) === 'false' ? 'filter brightness-0' : ''}}"  src="images/sroll-arrow.svg" alt=""></button>
  </th>
