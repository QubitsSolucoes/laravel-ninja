<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration {
	public function up() {
		Schema::create('produtos', function (Blueprint $table) {
			$table->increments('id');
			$table->string('referencia');
			$table->string('titulo');
			$table->longText('descricao');
			$table->float('preco', 8, 2);
			//$table->string('fotoproduto');
			$table->timestamps();
		});
	}

	public function down() {
		Schema::dropIfExists('produtos');
	}
}
