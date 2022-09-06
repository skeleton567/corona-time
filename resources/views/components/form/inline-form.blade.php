@props(['route', 'method', 'name'=> null, 'value' => null])

<form  action="{{$route}}" method="{{$method === 'get' ? $method : 'post'}}">
    @csrf
    @method($method)
    <input type="hidden" name="{{$name}}" value="{{$value}}">
    <button {{$attributes->merge(['class'=>""])}} type="submit">{{$slot}}</button>
</form>