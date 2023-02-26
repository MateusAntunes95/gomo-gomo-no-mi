@extends('layout', ['title' => 'Cadastro de úsuarios'])
@section('content')
<form method="get" action="{{ route('user.index') }}">
    <div>
        <label> Nome </label>
        <input type="text" name="name">
    </div>
    <div>
        <label> Código </label>
        <input type="text" name="id">
    </div>
    </div>
    <button type="submit"> Buscar </button>
    <a href="{{ route('user.create') }}"> <button type="button"> Criar</button></a> 
    </div>
</form>
<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado )
        <tr>
            <td>{{ $dado->id }}</td>
            <td>{{ $dado->name }}</td>
            <td>{{ $dado->email }}</td>
            <td>
                 <a href='{{ route('user.edit', $dado->id) }}'> <button type="button"> </button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection