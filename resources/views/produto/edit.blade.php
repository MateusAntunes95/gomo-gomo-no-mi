@extends('layout', ['title' => 'Editando produto'])
@section('content')
<form method="POST" action="{{ route('produto.update', $produto->id) }}">
    @csrf
    @method('PATCH')
    @include('produto._form')
</form>
@endsection
