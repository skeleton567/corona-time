<x-layout>
    
    <x-statistic-head title="Statistics by country">
     
    <section class="flex items-center space-x-2 lg:border lg:border-gray-100 rounded-lg lg:w-60 lg:my-10 lg:px-6 lg:h-12">
        <img class="w-4 h-4" src="images/loop.svg" alt="loop">
        <input class="appearence-none w-full h-16 lg:h-10  focus:outline-none text-sm md:w-40" type="text" placeholder="Search by country">
    </section>

    <table class="w-full md:block mt-2 bg-gray-100">
      <tr class="h-14 md:text-left">
        <th class="text-xs lg:text-sm md:w-80  relative md:pl-10">
          <span class="relative">Location<span class="text-gray-100">hf.</span> 
          <img class="absolute top-[0.2rem] right-0 md:top-1 md:right-0" src="images/sroll-arrow.svg" alt="">
          <img class="absolute top-[0.4rem] right-0 md:top-2 md:right-0 rotate-180 mt-1" src="images/sroll-arrow.svg" alt=""></span>
        </th>
        <th class="text-xs lg:text-sm md:w-80  relative md:pl-10">
          <span class="relative">New Cases<span class="text-gray-100">hf.</span> 
          <img class="absolute top-[0.2rem] right-0 md:top-1 md:right-0" src="images/sroll-arrow.svg" alt="">
          <img class="absolute top-[0.4rem] right-0 md:top-2 md:right-0 rotate-180 mt-1" src="images/sroll-arrow.svg" alt=""></span>
        </th>
        <th class="text-xs lg:text-sm md:w-80  relative md:pl-10">
          <span class="relative">Recovered<span class="text-gray-100">hf.</span> 
          <img class="absolute top-[0.2rem] right-0 md:top-1 md:right-0" src="images/sroll-arrow.svg" alt="">
          <img class="absolute top-[0.4rem] right-0 md:top-2 md:right-0 rotate-180 mt-1" src="images/sroll-arrow.svg" alt=""></span>
        </th>
        <th class="text-xs lg:text-sm md:w-80  relative md:pl-10">
          <span class="relative">Death<span class="text-gray-100">hf.</span> 
          <img class="absolute top-[0.2rem] right-0 md:top-1 md:right-0" src="images/sroll-arrow.svg" alt="">
          <img class="absolute top-[0.4rem] right-0 md:top-2 md:right-0 rotate-180 mt-1" src="images/sroll-arrow.svg" alt=""></span>
        </th>
      </tr>
        <table class="w-full md:block md:max-h-[500px] overflow-auto">
        @foreach ($countries as $country)
        <tr class="text-center md:text-left h-16">
          <td class="text-sm md:pl-10 md:w-80">{{$country->country}}</td>
          <td class="text-sm md:pl-10 md:w-80">{{$country->covidStatistic->confirmed}}</td>
          <td class="text-sm md:pl-10 md:w-80">{{$country->covidStatistic->recovered}}</td>
          <td class="text-sm md:pl-10 md:w-80">{{$country->covidStatistic->deaths}}</td>
        </tr>
        @endforeach
      </table>
 
 
    </x-statistic-head>
 
  
 
 </x-layout>
 