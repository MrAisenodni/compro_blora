<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stg_menu', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('route')->nullable();
            $table->string('url')->nullable();
            $table->string('icon', 50)->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_parent')->default(0);
            $table->boolean('is_login')->default(0);
            $table->boolean('is_shown')->default(1);
            $table->unsignedInteger('parent_id')->nullable();
            $table->integer('order_no')->nullable();

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
        Schema::dropIfExists('stg_menu');
    }
}
