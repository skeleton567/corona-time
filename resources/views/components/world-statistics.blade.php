@props(['statistic', 'name', 'image'])

<section {{$attributes->merge(['class'=>"rounded-2xl text-sm lg:text-base grow h-48 lg:h-full grid place-items-center"])}}>
    <img src="{{$image}}" alt="">
    <h3 lass="text-lg lg:text-xl">{{$name}}</h3>
    <p class="text-2xl lg:text-4xl font-bold text-blue-800">{{$statistic}}</p>
</section>