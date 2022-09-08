
<x-reset-password button="{{__('passwords.save_changes')}}" route="{{route('password.update')}}">
    <input type="hidden" name="token" value="{{$token}}">
    <input type="hidden" name="email" value="{{request('email')}}">
    <x-form.input label="{{__('login.password')}}" name="password" type="password" placeholder="{{__('login.password_placeholder')}}"/>
    <x-form.input name="password_confirmation" label="{{__('register.repeat_password')}}" type="password" placeholder="{{__('register.repeat_password')}}"/>
</x-reset-password>