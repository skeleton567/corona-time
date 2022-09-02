@props(['text', 'link'])

<div class="w-full flex justify-center">
    <p class="text-gray-400 text-xs">{{$text}}<a class="text-black font-bold" href="{{$link}}"> {{$slot}}</a></p>
</div>
