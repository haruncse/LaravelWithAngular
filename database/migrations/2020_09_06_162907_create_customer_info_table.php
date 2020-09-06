<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CustomerInfo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customerName', 200);
            $table->text('customerAddress');
            $table->enum('customerType', ['Regular', 'Frequent']);
            $table->dateTime('creationDate', 0);
            $table->timestamps();
            $table->charset = 'utf8mb4';    
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CustomerInfo');
    }
}
