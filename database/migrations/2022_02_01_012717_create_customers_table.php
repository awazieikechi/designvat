<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBiginteger('user_id')->constrained();
            $table->string('customer_first_name');
            $table->string('customer_middle_name');
            $table->string('customer_surname');
            $table->string('customer_photo');
            $table->string('customer_email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->string('customer_state');
            $table->string('customer_local_government');
            $table->string('customer_business_type');
            $table->string('customer_business_address');
            $table->string('customer_business_description');
            $table->string('marital_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('next_kin_name')->nullable();
            $table->string('next_kin_address')->nullable();
            $table->string('next_kin_phone_number')->nullable();
            $table->string('customer_guarantor_name');
            $table->text('customer_guarantor_address');
            $table->string('customer_guarantor_phone_no');
            $table->double('other_transactions')->nullable();
            $table->double('account_balance')->nullable();
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->unsignedBiginteger('branch_id')->constrained();

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
