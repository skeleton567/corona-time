<x-layout>    
   <x-statistic-head title="{{__('dashboard.worldwide_stat')}}">

        @if (isset($statistics[0]))
        <div class="mt-10 grid grid-cols-2 gap-x-4 lg:flex lg:items-center lg:space-x-4 lg:h-60">
            <x-world-statistics name="{{__('dashboard.new_case')}}" image="images/graph-yellow.png" class="bg-blue-100 col-span-2" statistic="{{$statistics[0]->confirmed}}"/>
            <x-world-statistics name="{{__('dashboard.recovered')}}" image="images/graph-green.png" class="bg-green-100 mt-4 lg:mt-0" statistic="{{$statistics[0]->recovered}}"/>
            <x-world-statistics name="{{__('dashboard.death')}}" image="images/graph-blue.png" class="bg-yellow-100 mt-4 lg:mt-0" statistic="{{$statistics[0]->deaths}}"/>
        </div> 
        @else
            
        @endif
      

   </x-statistic-head>
</x-layout>

