<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

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

        return view('produto.show', array('produto' => $produto));
    }

    public function create()
    {
        return view('produto.create');
    }

}
