<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->text('short_description');
            $table->text('long_description');
            $table->integer('category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('product_slug');
            $table->integer('product_quantity')->default(1);
            $table->float('product_price',10,2);
            $table->tinyInteger('publication_status')->default(0);
            $table->float('offer_price',10,2)->nullable();
            $table->integer('admin_id')->unsigned();
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
