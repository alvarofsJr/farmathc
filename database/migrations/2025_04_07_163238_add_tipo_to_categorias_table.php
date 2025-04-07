<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoToCategoriasTable extends Migration
{
    public function up()
    {
        Schema::table('remedios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_categoria')->nullable()->after('id');

            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('remedios', function (Blueprint $table) {
            $table->dropForeign(['id_categoria']);
            $table->dropColumn('id_categoria');
        });
    }

}
