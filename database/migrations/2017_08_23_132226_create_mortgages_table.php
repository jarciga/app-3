<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMortgagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mortgages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->bigInteger('user_id');
            $table->string('branch', 25)->nullable();
            $table->string('or_number', 25)->nullable();
            $table->string('pawn_ticket_number', 25)->nullable();
            $table->string('ref_pawn_ticket_number', 25)->nullable();

            $table->date('date_loan_granted')->nullable();
            $table->date('maturity_date')->nullable();
            $table->date('expiry_date_of_redemption_period')->nullable();

            //$table->string('loan_amount_in_words')->nullable();
            $table->double('loan_amount_in_numbers', 15, 4)->nullable();

            //$table->string('interest_rate_in_words')->nullable();
            $table->double('interest_rate_in_numbers', 15, 4)->nullable();
            

            //$table->string('pledge_time_period')->nullable();
            //$table->string('pledge_time_period_type')->nullable();

            //$table->string('appraised_value_in_words')->nullable();
            $table->double('appraised_value_in_numbers', 15, 4)->nullable();

            $table->double('penalty_interest')->nullable();

            $table->double('principal')->nullable();
            $table->double('interest_in_absolute_amount', 15, 4)->nullable();
            $table->double('service_charge_in_amount', 15, 4)->nullable();
            $table->double('liquidated_damages', 15, 4)->nullable();
            $table->double('net_proceeds', 15, 4)->nullable();
            $table->double('effective_interest_rate_in_percent', 15, 4)->nullable();
            $table->string('loan_status', 25)->nullable();
            $table->string('canceled_transaction', 10)->default('false');

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
        Schema::dropIfExists('mortgages');
    }
}
