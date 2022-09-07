<header class="px-4 pb-8 pt-6 lg:px-28 flex h-5 justify-between mt-6 items-center border-b-2 border-gray-100">
        
    <img src="images/coronatime.svg" alt="coronatime">
  
<div class="lg:w-80  flex justify-between items-center">
    <form action="{{route('language.change')}}" class="flex border-right border-" method="post">
        @csrf
        <select name="locale" class="appearance-none " onchange="this.form.submit()">
            <option {{ app()->getLocale() === 'en' ? 'selected' : '' }} name="locale" value="en">English</option>
            <option {{ app()->getLocale() === 'ka' ? 'selected' : '' }} name="locale" value="ka">Georgian</option>
        </select>
        <img class="w-2 h-2 translate-y-2 mr-10 md:mr-12" src="images/arrow.svg" alt="">
    </form>
   
   <div class="container mx-auto items-center mr-2 flex justify-between">
    <button id="toggle" class="md:hidden">
        <x-button-svg/>
    </button>

    <nav id="nav" class="fixed top-20 bottom-0 -right-full w-20 md:w-60 md:static transition-all">
        <ul class="md:flex items-center">
            <li>
                <p class="block p-3 text-xs md:text-base font-bold">{{auth()->user()->username}}</p>
            </li>
            <li>
                <x-form.inline-form class="block p-3 text-xs md:text-base md:border-l-2 border-gray-100" method="POST" route="{{route('logout')}}">Log out</x-form.inline-form>
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