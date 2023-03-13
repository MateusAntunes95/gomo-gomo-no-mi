@extends('layout', ['title' => 'Criar produto'])
@section('content')
<form method="post" action="{{ route('produto.store') }}">
    @csrf
    @include('produto._form')
</form>
@endsection