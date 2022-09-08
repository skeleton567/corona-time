
<x-reset-password button="{{__('passwords.reset_password')}}" route="{{route('password.email')}}">
    <x-form.input label="{{__('register.email')}}" name="email" placeholder="{{__('register.email_placeholder')}}"/> 
</x-reset-password>