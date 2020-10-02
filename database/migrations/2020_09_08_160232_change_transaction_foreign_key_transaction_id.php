<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTransactionForeignKeyTransactionId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_transaction_id_foreign');
            $table->dropColumn('transaction_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('transaction_id')
                ->nullable()
                ->index()
                ->constrained()
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
