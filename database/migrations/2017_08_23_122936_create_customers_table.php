<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            //$table->string('customer_number', 25)->nullable();
            //$table->string('honorifics', 25)->nullable();
            $table->string('full_name', 50)->nullable();
            //$table->string('first_name', 50)->nullable();
            //$table->string('last_name', 50)->nullable();
            //$table->string('middle_name', 50)->nullable();
            //$table->string('suffix', 10)->nullable();
            
            //$table->text('resident_address');
            //$table->text('address_line_1')->nullable();
            //$table->text('address_line_2')->nullable();
            //$table->text('address_line_3')->nullable();
            //$table->text('address_line_4')->nullable(); //Complete Address (House Number, Building and Street Name and Subdivision)
            $table->text('complete_address')->nullable();

            //$table->string('street')->nullable();
            //$table->string('subdivision')->nullable();
            //$table->string('barangay')->nullable(); //Barangay
            //$table->string('city')->nullable(); //City/Municipality
            //$table->string('province')->nullable(); //Province
            //$table->string('country')->default('PH')->nullable()
            //$table->string('country')->nullable();
            $table->string('identification_card', 50)->nullable();
            $table->string('identification_card_type', 100)->nullable();
            $table->string('contact_number', 25)->nullable();
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
