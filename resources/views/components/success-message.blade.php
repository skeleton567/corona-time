<x-layout>
    <div class="h-screen py-6 px-4">
        <div class="lg:flex lg:justify-center">
            <img src="/images/coronatime.svg" alt="coronatime">
        </div>
    
        <main class="h-[calc(100vh-66px)] flex flex-col justify-center items-center">

                <div class="h-full lg:h-80 flex flex-col justify-center items-center">
                    <img width="50px" height="50px" src="/images/icon-checked.png" alt="checked">
                    <p class="text-center">{{$slot}}</p>
                
                </div>
                
                <div class="w-full lg:w-96">
                    <a href="/login"><x-form.button>Sign in</x-form.button></a>
                </div>
                
                
        </main>

    </div>

</x-layout>