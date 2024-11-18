<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBundlesTable extends Migration
{
    public function up()
{
    Schema::table('bundles', function (Blueprint $table) {
        $table->string('status')->default('pending');  // Add a default value, e.g., 'pending'
    });
}

public function down()
{
    Schema::table('bundles', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

}


