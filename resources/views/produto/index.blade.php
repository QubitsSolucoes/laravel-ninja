@extends('layout.app')
@section('title', 'Listagem de Produtos')
@section('content')
    <h1>Produtos</h1>

    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{ Session::get('mensagem') }}
        </div>
    @endif

    <div class="row">
        @foreach($produtos as $produto)
            <div class="col-md-3">
                <h4>{{ $produto->titulo }}</h4>
                @if(file_exists("./img/produtos/".md5($produto->id).".jpg"))
                    <a class="thumbnail" href="{{ url('produtos/'.$produto->id) }}">
                        {{ Html::image(asset("img/produtos/".md5($produto->id).".jpg")) }}
                    </a>
                @else
                    <a href="{{ url('produtos/'.$produto->id) }}" class="thumbnail">
                        {{ $produto->titulo }}
                    </a>
                @endif
                {{ Form::open(['route'=>['produtos.destroy', $produto->id], 'method'=>'DELETE']) }}
                <a href="{{ url('produtos/'.$produto->id.'/edit') }}" class="btn btn-default">Editar</a>
                {{ Form::submit('Excluir', ['class'=>'btn btn-default']) }}
                {{ Form::close() }}
            </div>
        @endforeach
    </div>
@endsection