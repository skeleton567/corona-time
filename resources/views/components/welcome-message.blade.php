@props(['message'])

<main class="mt-6 lg:w-[58%] lg:mt-9 lg:ml-36">
    <img src="images/coronatime.svg" alt="coronatime">
    <h1 class="mt-11 lg:mt-16 font-bold text-sm lg:text-2xl ">Welcome {{$message}}</h1>
    {{$slot}}

</main>