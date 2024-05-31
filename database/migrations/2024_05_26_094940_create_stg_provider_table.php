<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stg_provider', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('subtitle', 100)->nullable();
            $table->longText('description')->nullable();
            $table->string('birth_place', 50)->nullable();
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('village')->nullable();
            $table->text('maps')->nullable();
            $table->string('phone_no', 25)->nullable();
            $table->string('home_no', 25)->nullable();
            $table->string('office_no', 25)->nullable();
            $table->string('logo')->nullable();
            $table->string('logo_header')->nullable();

            // Standard Structre
            $table->boolean('disabled')->default(0);
            $table->dateTime('created_at');
            $table->string('created_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('updated_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stg_provider');
    }
}
