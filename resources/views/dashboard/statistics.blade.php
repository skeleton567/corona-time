<x-layout>
    
    <x-statistic-head title="{{__('dashboard.by_country_stat')}}">
     <form action="{{route('dashboard.statistics')}}">
    <section class="flex items-center space-x-2 lg:border lg:border-gray-100 rounded-lg lg:w-60 lg:my-10 lg:px-6 lg:h-12">
       <button type="submit"><img class="w-4 h-4" src="/images/loop.svg" alt="loop"></button> 
        
          <input name="search" class="appearence-none w-full h-16 lg:h-10  focus:outline-none text-sm md:w-40" type="text" placeholder="{{__('dashboard.search')}}" 
          value="{{request('search')}}">
        
    </section>

    <table class="w-full block mt-2 bg-gray-100">
      <tr class="h-14 md:text-left">
       <x-table-head class="md:pl-0 md:w-52 {{app()->getLocale() === 'en' ? 'text-xs' : 'text-[0.5rem]'}}" name="country">{{__('dashboard.location')}}</x-table-head>
       <x-table-head class="{{app()->getLocale() === 'en' ? 'text-xs' : 'text-[0.5rem]'}}" name="confirmed" >{{__('dashboard.new_case')}}</x-table-head>
       <x-table-head class="{{app()->getLocale() === 'en' ? 'text-xs' : 'text-[0.5rem]'}}" name="recovered" >{{__('dashboard.recovered')}}</x-table-head>
       <x-table-head class="{{app()->getLocale() === 'en' ? 'text-xs' : 'text-[0.5rem]'}}" name="deaths" >{{__('dashboard.death')}}</x-table-head>
      </tr>
    </form>
        <table class="w-full block max-h-[60vh] md:max-h-[50vh] overflow-auto">
        @forelse ($statistics as $statistic)
        <tr class="text-center md:text-left h-16">
          <x-table-data  class="md:pl-0 md:w-52" >{{$statistic->country}}</x-table-data>
          <x-table-data >{{$statistic->confirmed}}</x-table-data>
          <x-table-data >{{$statistic->recovered}}</x-table-data>
          <x-table-data >{{$statistic->deaths}}</x-table-data>
        </tr>
        @empty
            
        @endforelse
      </table>
    
    </x-statistic-head>
 
  
 
 </x-layout>
 