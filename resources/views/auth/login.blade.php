<x-layout> 
    <div class="flex items-start justify-center p-3 lg:m-0 lg:p-0 lg:h-screen">
        <x-welcome-message message="{{__('login.welcome_back')}}">
            <p class="mt-2 lg:mt-4 text-xs lg:text-xl text-gray-400">{{__('login.enter_details')}}</p>
            
            <form class="w-full lg:w-96" action="{{route('login')}}" method="post">
                @csrf
                <x-form.input label="{{__('login.username')}}" name="username" placeholder="{{__('login.login_username_placeholder')}}"/> 
                <x-form.input label="{{__('login.password')}}" name="password" type="password" placeholder="{{__('login.password_placeholder')}}"/>

                <div class="flex justify-between text-xs w-full mt-6 space-x-2">
                    <div class="flex items-center space-x-1 md:space-x-2">
                        <input class="block border border-gray-300 rounded" type="checkbox" name="remember" id="remember">
                        <label class="font-bold text-xs" for="remember_token">{{__('login.remember_me')}}</label>
                    </div>

                    <a class="text-blue-700 font-semibold text-xs" href="{{route('password.request')}}">{{__('login.forgot_password')}}</a>
                </div>
           
                <x-form.button>Log In</x-form.button> 

                <x-form.redirect text="{{__('login.no_account')}}" link="{{route('auth.register')}}"> {{__('login.sign_up')}}</x-form.redirect>
            </form>
           
        </x-welcome-message>

        <x-side-photo/>
    </div>
    
</x-layout>