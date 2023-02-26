@extends('layout', ['title' => 'Editando úsuario'])
@section('content')
<form method="put" action="{{ route('user.update', $user->id) }}">
    @csrf
    @include('user._form')
</form>
@endsection