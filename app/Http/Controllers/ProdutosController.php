<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        echo "<pre>";
            print_r($produtos);
        echo "</pre>";
    }

    public function show($id){
        $produto = Produto::find($id);
        echo "<pre>";
            print_r($produto);
        echo "</pre>";
    }
}
