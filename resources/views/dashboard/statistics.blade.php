<x-layout>
    
    <x-statistic-head title="Statistics by country">
     
    <section class="flex items-center space-x-2 lg:border lg:border-gray-100 rounded-lg lg:w-60 lg:my-10 lg:px-6 lg:h-12">
        <img class="w-4 h-4" src="/images/loop.svg" alt="loop">
        <form action="{{route('dashboard.statistics')}}">
          <input name="search" class="appearence-none w-full h-16 lg:h-10  focus:outline-none text-sm md:w-40" type="text" placeholder="Search by country" 
          value="{{request('search')}}">
        </form>
    </section>

    <table class="w-full block mt-2 bg-gray-100">
      <tr class="h-14 md:text-left">
       <x-table-head name="country" value_asc='asc' value_desc="desc">Location</x-table-head>
       <x-table-head name="confirmed">New case</x-table-head>
       <x-table-head name="recovered">Recovered</x-table-head>
       <x-table-head name="deaths">Death</x-table-head>
      </tr>
        <table class="w-full block max-h-[60vh] md:max-h-[50vh] overflow-auto">
        @foreach ($countries as $country)
        <tr class="text-center md:text-left h-16">
          <x-table-data >{{$country->country}}</x-table-data>
          <x-table-data >{{$country->covidStatistic->confirmed}}</x-table-data>
          <x-table-data >{{$country->covidStatistic->recovered}}</x-table-data>
          <x-table-data >{{$country->covidStatistic->deaths}}</x-table-data>
        </tr>
        @endforeach
      </table>
 
 
    </x-statistic-head>
 
  
 
 </x-layout>
 