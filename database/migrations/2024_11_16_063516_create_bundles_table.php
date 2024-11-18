<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundlesTable extends Migration
{
    public function up()
    {
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->string('bundle_name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('bundle_image');
            $table->timestamps();
        });

        Schema::create('bundle_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bundle_id')->constrained('bundles')->onDelete('cascade');
            $table->string('category');
            $table->string('category_image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bundle_categories');
        Schema::dropIfExists('bundles');
    }
}
