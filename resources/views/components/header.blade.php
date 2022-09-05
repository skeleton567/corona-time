<header class="px-4 pb-8 pt-6 lg:px-28 flex h-5 justify-between mt-6 items-center border-b-2 border-gray-100">
        
    <img src="images/coronatime.svg" alt="coronatime">
  
<div class="lg:w-80  flex justify-between items-center">
    <div class="flex border-right border-">
        <select name="" id=""
        class="appearance-none ">
            <option value="">English</option>
            <option value="">Georgian</option>
        </select>
        <img class="w-2 h-2 translate-y-2 mr-10 md:mr-12" src="images/arrow.svg" alt="">
    </div>
   
   <div class="container mx-auto items-center mr-2 flex justify-between">
    <button id="toggle" class="md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <nav id="nav" class="fixed top-20 bottom-0 -right-full w-16 md:w-auto md:static transition-all">
        <ul class="md:flex">
            <li>
                <a class="block p-3 font-bold" href="#">Kyle</a>
            </li>
            @auth
            <li>
                <a class="block p-3 md:border-l-2 border-gray-100" href="#">Log out </a>
            </li>
            @else
            <li>
                <a class="block p-3 md:border-l-2 border-gray-100" href="#">Log in</a>
            </li>
            @endauth
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