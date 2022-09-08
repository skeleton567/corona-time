@props(['name'])

<th {{$attributes->merge(['class'=>"lg:text-sm pl-2 md:w-80 relative md:pl-10 text-left md:text-center break-all"])}}>
    <span class="relative">{{$slot}}<span class="text-gray-100">hf.</span> 
    <button name="{{$name}}" value="true" class="absolute top-[0.1rem] right-0 md:top-[0.2rem] md:right-0 break-words"><img class="{{request()->query($name) === 'true' ? 'filter brightness-0' : ''}}"  src="images/sroll-arrow.svg" alt=""></button>
    <button name="{{$name}}" value="false" class="absolute top-[0.25rem] right-0 md:top-[0.35rem] md:right-0 rotate-180 mt-1 break-words"><img class="{{request()->query($name) === 'false' ? 'filter brightness-0' : ''}}"  src="images/sroll-arrow.svg" alt=""></button>
  </th>
