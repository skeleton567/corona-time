<x-layout>
    <div class="h-screen py-6 px-4">
        <div class="lg:flex lg:justify-center">
            <img class="mt-6 ml-4" src="/images/coronatime.svg" alt="coronatime">
        </div>
    
        <main class="h-[calc(100vh-150px)] lg:h-[calc(100vh-250px)] flex flex-col justify-center items-center">
                <img src ="/images/icon-checked.png" alt="checked">
                <p>{{$slot}}<p>

    </div>

</x-layout>