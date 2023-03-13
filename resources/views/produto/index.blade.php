@extends('layout', ['title' => 'Cadastro de úsuarios'])
@section('content')
<form method="get" action="{{ route('user.index') }}">
    <div>
        <label> Nome </label>
        <input type="text" name="nome">
    </div>
    <div>
        <label> Código </label>
        <input type="text" name="id">
    </div>
    <div>
        <label> Preço </label>
        <input type="text" name="preco">
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
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $dado )
        <tr>
            <td>{{ $dado->id }}</td>
            <td>{{ $dado->nome }}</td>
            <td>{{ number_format($dado->preco, 2, ',', '.') }}</td>
            <td>
                 <a href='{{ route('produto.edit', $dado->id) }}'> <button type="button"> </button></a>
                 <form method="post" action="{{ route('produto.destroy', $dado->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"></button>
                 </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
