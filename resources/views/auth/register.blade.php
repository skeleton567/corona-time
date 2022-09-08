<x-layout>
    <div class="flex items-start justify-center p-3 lg:m-0 lg:p-0 lg:h-screen">
        <x-welcome-message message="{{__('register.welcome_coronatime')}}">
            <p class="mt-2 lg:mt-4 text-xs lg:text-xl text-gray-400">{{__('register.enter_info')}}</p>
            
            <form class="w-full lg:w-96" action="{{route('register')}}" method="post">
                @csrf
                @csrf
                <x-form.input label="{{__('login.username')}}" name="username" placeholder="{{__('register.register_username_placeholder')}}"/> 
                <x-form.input label="{{__('register.email')}}" name="email" placeholder="{{__('register.email_placeholder')}}"/> 
                <x-form.input label="{{__('login.password')}}" name="password" type="password" placeholder="{{__('login.password_placeholder')}}"/>
                <x-form.input name="password_confirmation" label="{{__('register.repeat_password')}}" type="password" placeholder="{{__('register.repeat_password')}}"/>

               
                    
           
                <x-form.button>{{__('register.sign_up')}}</x-form.button> 
                <x-form.redirect text="{{__('register.have_account')}}" link="{{route('auth.login')}}">{{__('login.log_in')}}</x-form.redirect>
            </form>
           
        </x-welcome-message>

        <x-side-photo/>
    </div>
    
</x-layout>