<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Especie;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 100);
            $table->string("nome_dono", 100);
            $table->string("raca", 100);
            $table->foreignIdFor(Especie::class);
            $table->string("data_nascimento", 10);
            $table->timestamps();
            $table->foreign("especie_id")->references("id")->on("especie");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
};
