@extends('layout.app')
@section('title', 'Detalhes do Produtos')
@section('content')
    <h1>Produto {{$produto->titulo}}</h1>
    <ul>
        <li>Referência: {{$produto->referencia}}</li>
        <li>Preço: {{$produto->preco}}</li>
        <li>Adicionado em: {{$produto->created_at}}</li>
    </ul>
    <p>{{$produto->descricao}}</p>
    <a href="javascript:history.go(-1)" class="btn btn-success">Voltar</a>
@endsection