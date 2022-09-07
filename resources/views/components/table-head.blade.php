@props(['name', 'value_desc'=>'false', 'value_asc' => true])

<th {{$attributes->merge(['class'=>"text-xs lg:text-sm pl-2 w-22 md:w-80 relative md:pl-10 text-left"])}}>
    <span class="relative">{{$slot}}<span class="text-gray-100">hf.</span> 
    <button name="{{$name}}" value="{{$value_asc}}" class="absolute top-[0.2rem] right-0 md:top-1 md:right-0"><img  src="images/sroll-arrow.svg" alt=""></button>
    <button name="{{$name}}" value="{{$value_desc}}" class="absolute top-[0.4rem] right-0 md:top-2 md:right-0 rotate-180 mt-1"><img  src="images/sroll-arrow.svg" alt=""></button>
  </th>