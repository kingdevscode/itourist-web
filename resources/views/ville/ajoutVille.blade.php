@extends('app')

@section('content')
<form action="{{url('tourisme/ville/add-ville')}}" method="POST">
    @csrf
    <input type="text" name="nom" placeholder="nom de la ville">
    <button type="submit">envoyer</button>
</form>
@endsection
