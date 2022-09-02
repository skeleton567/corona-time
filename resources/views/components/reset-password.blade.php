
@props(['button'])

<x-layout>
    <div class="h-screen py-6 px-4 lg:grid lg:place-items-center">
        
        <div class="lg:flex lg:justify-center">
            <img class="mt-6" src="images/coronatime.svg" alt="coronatime">
        </div>
        
    
        <main class="mt-11 flex flex-col h-[calc(100vh-150px)] lg:h-[calc(100vh-250px)] lg:w-96 justify-between lg:block lg:mt-36">
            <div class="w-full lg:mb-14">
                <h1 class="text-center font-bold text-xl lg:text-2xl mb-4 lg:mb-8">Reset Password</h1>
                    {{$slot}}
            </div>
    
            <x-form.button>{{$button}}</x-form.button> 
        </main>
        </div>
    

</x-layout>