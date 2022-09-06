
<x-reset-password button="Save Changes" route="{{route('password.update')}}">
    <input type="hidden" name="token" value="{{$token}}">
    <input type="hidden" name="email" value="{{$_REQUEST['email']}}">
    <x-form.input name="password" label="New Password" type="password" placeholder="Fill in password"/>
    <x-form.input name="password_confirmation" label="Repeat Password" type="password" placeholder="Repeat password"/>
</x-reset-password>