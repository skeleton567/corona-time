<x-layout>
   
    
   <x-statistic-head title="{{__('dashboard.worldwide_stat')}}">

    <div class="mt-10 grid grid-cols-2 gap-x-4 lg:flex lg:items-center lg:space-x-4 lg:h-60">

        <section class="bg-blue-100 rounded-2xl grow h-48 lg:h-full grid place-items-center col-span-2">
            <img src="images/graph-yellow.png" alt="">
            <h3 lass="text-lg lg:text-xl">{{__('dashboard.new_case')}}</h3>
            <p class="text-2xl lg:text-4xl font-bold text-blue-800">{{$statistics[0]->confirmed}}</p>
        </section>

        <section class="bg-green-100 rounded-2xl mt-4 grow h-48 lg:h-full grid place-items-center lg:mt-0">
            <img src="images/graph-green.png" alt="">
            <h3 lass="text-lg lg:text-xl">{{__('dashboard.recovered')}}</h3>
            <p class="text-2xl lg:text-4xl font-bold text-green-800">{{$statistics[0]->recovered}}</p>
        </section>

        <section class="bg-yellow-100 rounded-2xl mt-4 grow h-48 lg:h-full grid place-items-center lg:mt-0">
            <img src="images/graph-blue.png" alt="">
            <h3 class="text-lg lg:text-xl">{{__('dashboard.death')}}</h3>
            <p class="text-2xl lg:text-4xl font-bold text-yellow-500">{{$statistics[0]->deaths}}</p>
        </section>
    </div>

    


   </x-statistic-head>

 

</x-layout>

