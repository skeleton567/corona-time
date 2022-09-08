<header class="px-4 pb-8 pt-6 lg:px-28 flex h-5 justify-between mt-6 items-center border-b-2 border-gray-100">
        
    <img src="images/coronatime.svg" alt="coronatime">
  
<div class="lg:w-96 flex justify-between items-center">
    <form action="{{route('language.change')}}" class="flex border-right border-" method="post">
        @csrf
        <select name="locale" class="appearance-none " onchange="this.form.submit()">
            <option {{ app()->getLocale() === 'en' ? 'selected' : '' }} name="locale" value="en">English</option>
            <option {{ app()->getLocale() === 'ka' ? 'selected' : '' }} name="locale" value="ka">ქართული</option>
        </select>
        <img class="w-2 h-2 translate-y-2 mr-10 md:mr-12" src="images/arrow.svg" alt="">
    </form>
   
   <div class="container mx-auto items-center mr-2 flex justify-between md:w-90">
    <button id="toggle" class="md:hidden">
        <x-button-svg/>
    </button>

    <nav id="nav" class="fixed top-[84px] h-24 w-36 -right-full max-w-20 md:w-72 md:static md:h-full transition-all shadow-md md:max-w-full md:shadow-none z-50 bg-white">
        <ul class="md:w-full md:flex items-center justify-between">
            <li>
                <p class="block p-3 text-xs md:text-base font-bold w-full break-all md:break-normal text-center md:text-left">{{auth()->user()->username}}</p>
            </li>
            <li>
                <x-form.inline-form class="block p-3 text-xs md:text-base md:border-l-2 border-gray-100 w-full" method="POST" route="{{route('logout')}}">{{__('dashboard.log_out')}}</x-form.inline-form>
            </li>
        </ul>
    </nav>
</div>

   <script>
        document.getElementById("toggle").addEventListener("click", function () {
        document.getElementById("nav").classList.toggle("-right-full")
        document.getElementById("nav").classList.toggle("right-0")
        })
   </script>
   
</div>

</header>