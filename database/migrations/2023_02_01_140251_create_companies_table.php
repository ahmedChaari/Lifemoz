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
            $table->string('gerant');
            $table->text('adresse');
            $table->string('email')->nullable();
            $table->integer('tel');
            $table->integer('tel_mobile');
            $table->integer('fax')->nullable();
            $table->string('ICE');
            $table->string('fiscale');
            $table->string('registre_commerce');
            $table->string('patent');
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
