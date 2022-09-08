<x-layout>
    <div class="flex items-start justify-center p-3 lg:m-0 lg:p-0 lg:h-screen">
        <x-welcome-message message="to Coronatime">
            <p class="mt-2 lg:mt-4 text-xs lg:text-xl text-gray-400">Please enter required info to sign up</p>
            
            <form class="w-full lg:w-96" action="{{route('register')}}" method="post">
                @csrf
                <x-form.input name="username" placeholder="Enter unique username"/> 
                <x-form.input name="email" placeholder="Enter unique email"/> 
                <x-form.input name="password" type="password" placeholder="Fill in password"/>
                <x-form.input name="password_confirmation" label="Repeat Password" type="password" placeholder="Repeat password"/>

                
                    
           
                <x-form.button>Sign up</x-form.button> 
                <x-form.redirect text="Already have and accoun?" link="{{route('auth.login')}}">Log in</x-form.redirect>
            </form>
           
        </x-welcome-message>

        <x-side-photo/>
    </div>
    
</x-layout>