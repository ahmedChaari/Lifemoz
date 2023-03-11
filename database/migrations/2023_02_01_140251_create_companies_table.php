<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('activite');
            $table->date('date_creation');
            $table->string('gerant')->nullable();
            $table->string('ville')->nullable();
            $table->text('pays')->nullable();
            $table->text('adresse')->nullable();
            $table->string('email')->nullable();
            $table->integer('tel')->nullable();
            $table->integer('tel_mobile')->nullable();
            $table->integer('fax')->nullable();
            $table->string('ICE')->nullable();
            $table->string('fiscale')->nullable();
            $table->string('registre_commerce')->nullable();
            $table->string('patent')->nullable();
            $table->string('web')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('has_activated')->nullable()->default(true);
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
        Schema::dropIfExists('companies');
    }
}
