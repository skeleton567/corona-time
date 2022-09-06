@props(['route', 'method'])

<form  action="{{$route}}" method="{{$method === 'get' ? $method : 'post'}}">
    @csrf
    @method($method)
    <button {{$attributes->merge(['class'=>""])}} type="submit">{{$slot}}</button>
</form>