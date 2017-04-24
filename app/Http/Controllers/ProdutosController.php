<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Session;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return view('produto.index', array('produtos' => $produtos));
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        //dd($produto);

        return view('produto.show', array('produto' => $produto));
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'referencia' => 'required|unique:produtos|min:3',
            'titulo' => 'required|min:3',
        ]);
        $produto = new Produto();
        $produto->referencia = $request->input('referencia');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');

        if ($request->hasFile('fotoproduto')) {
            $imagem = $request->file('fotoproduto');
            $num = rand(1111, 9999);
            $dir = "img/produtos";
            $extensao = $imagem->getClientOriginalExtension();
            $nomeImagem = "imagem_" . $num . "." . $extensao;

            $imagem->move($dir, $nomeImagem);

            $produto['fotoproduto'] = $dir . "/" . $nomeImagem;
        }

        $produto->fotoproduto = $request->input('fotoproduto');

        //dd($produto);

        if ($produto->save()) {
            return redirect('produtos');
        }
    }

    public function edit($id)
    {
        $produto = Produto::find($id);

        return view('produto.edit', array('produto' => $produto));
    }

    public function update($id, Request $request)
    {
        $produto = Produto::find($id);
        $this->validate($request, [
            'referencia' => 'required|min:3',
            'titulo' => 'required|min:3',
        ]);

        if ($request->hasFile('fotoproduto')) {
            $imagem = $request->file('fotoproduto');
            $nomearquivo = md5($id) . "." . $imagem->getClientOriginalExtension();
            $request->file('fotoproduto')->move(public_path('./img/produtos/'), $nomearquivo);
        }

        $produto->referencia = $request->input('referencia');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');

        $produto->save();

        Session::flash('mensagem', 'Produto alterado com sucesso.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        Session::flash('mensagem', 'Produto excluído com sucesso!');
        return redirect()->back();
    }
}
