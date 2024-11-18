<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // In database/migrations/xxxx_xx_xx_xxxxxx_add_category_to_products_table.php

public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('category')->after('price'); // Adjust the position if needed
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn('category');
    });
}

};
