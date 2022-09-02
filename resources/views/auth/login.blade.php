<x-layout> 
    <div class="flex items-start justify-center lg:m-0 lg:p-0 lg:h-screen">
        <x-welcome-message message="back">
            <p class="mt-2 lg:mt-4 text-xs lg:text-xl text-gray-400">Welcome back! Please enter your details</p>
            
            <form class="w-full lg:w-96" action="{{route('login')}}" method="post">
                @csrf
                <x-form.input name="username" placeholder="Enter unique username or email"/> 
                <x-form.input name="password" type="password" placeholder="Fill in password"/>

                <div class="flex justify-between text-xs w-full my-6">
                    <div class="flex items-center space-x-2">
                        <input class="block border border-gray-300 rounded" type="checkbox" name="remember_token" id="remember_token">
                        <label class=" font-bold" for="remember_token">Rememeber this device</label>
                    </div>

                    <a class="text-blue-700 font-semibold" href="#">Forgot Password?</a>
                </div>
           
                <x-form.button>Log In</x-form.button> 

                <x-form.redirect text="Dont have an account?" link="{{route('auth.register')}}"> Sign up for free</x-form.redirect>
            </form>
           
        </x-welcome-message>

        <x-side-photo/>
    </div>
    
</x-layout>