<x-layout>
   
    
   <x-statistic-head title="Worldwide staticstics">

    <div class="mt-10 grid grid-cols-2 gap-x-4 lg:flex lg:items-center lg:space-x-4 lg:h-60">

        <section class="bg-blue-100 rounded-2xl grow h-48 lg:h-full grid place-items-center col-span-2">
            <img src="images/graph-yellow.png" alt="">
            <h3 lass="text-lg lg:text-xl">New Case</h3>
            <p class="text-2xl lg:text-4xl font-bold text-blue-800">{{$statistics[0]->confirmed}}</p>
        </section>

        <section class="bg-green-100 rounded-2xl mt-4 grow h-48 lg:h-full grid place-items-center lg:mt-0">
            <img src="images/graph-green.png" alt="">
            <h3 lass="text-lg lg:text-xl">Recovered</h3>
            <p class="text-2xl lg:text-4xl font-bold text-green-800">{{$statistics[0]->recovered}}</p>
        </section>

        <section class="bg-yellow-100 rounded-2xl mt-4 grow h-48 lg:h-full grid place-items-center lg:mt-0">
            <img src="images/graph-blue.png" alt="">
            <h3 class="text-lg lg:text-xl">Death</h3>
            <p class="text-2xl lg:text-4xl font-bold text-yellow-500">{{$statistics[0]->deaths}}</p>
        </section>
    </div>

    <footer class="mt-32 w-full h-60 bg-green-blue rounded-2xl hidden md:grid place-items-center">
        <div class="text-center">
            <h3 class="font-bold text-2xl">Get notified first</h3>
            <p class="mt-4">Get <span class="font-bold">personalised</span> notification via email</p>
        </div>

        <form class="flex justify-center items-center space-x-4 h-16 w-[424px] bg-white rounded-[32px]" action="">
            <img class="w-5 h-5" src="images/loop.svg" alt="loop">
            <input class="appearence-none w-60 h-12  focus:outline-none" type="text" placeholder="Enter your email">
            <button class="text-sm text-white bg-green-400 rounded-[27px] py-3 px-7 hover:bg-green-700" type="submit">SEND</button>
        </form>

    </footer>


   </x-statistic-head>

 

</x-layout>

