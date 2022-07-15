<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('cart_id');
            $table->string('invoice_id');
            $table->string('order_number');
            $table->string('marking_code');
            $table->string('tracking_number');
            $table->string('product_name');
            $table->string('product_cover');
            $table->string('category_id_blueray');
            $table->string('last_status');
            $table->string('paid_at');
            $table->enum('shipping_method', ['sea', 'air']);
            $table->decimal('total_weight', 13, 2);
            $table->string('total_cbm', 13, 4);
            $table->decimal('freight_package', 13, 2);
            $table->date('created');
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
        Schema::dropIfExists('orders');
    }
}
