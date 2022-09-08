@props(['title'])
<x-layout>
    <x-header/>

<main class="px-4 lg:px-28 mt-4 lg:mt-10">

    <h1 class="font-bold text-xl lg:text-2xl">{{$title}}</h1>

    <section class="mt-6 flex border-b-2 border-gray-100 space-x-6">
        <a href="{{route('dashboard.world')}}" class="text-sm pb-4 {{Route::currentRouteName() === 'dashboard.world' ? 'font-bold border-b-[2px] border-b-black' : '' }}">{{__('dashboard.worldwide')}}</a>
        <a href="{{route('dashboard.statistics')}}" class="text-sm pb-4 {{Route::currentRouteName() === 'dashboard.statistics'  ? 'font-bold border-b-[2px] border-b-black' : '' }}">{{__('dashboard.by_country')}}</a>
    </section>

    {{$slot}}

    </main>

</x-layout>