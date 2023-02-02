<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('company_id')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignUuid('category_id');
            $table->foreignUuid('depot_id');
            $table->foreignUuid('user_id');
            $table->foreignUuid('unity_id');
            $table->integer('quantite');
            $table->integer('achat')->nullable();
            $table->integer('vente')->nullable();
            $table->integer('stock_min');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
