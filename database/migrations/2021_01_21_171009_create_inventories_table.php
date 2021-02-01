<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('transaction_id');
            $table->string('po_no');
            $table->string('po_date');
            $table->string('qc_no');
            $table->integer('supplier_id');
            $table->integer('quantity');
            $table->integer('item_id')->nullable();
            $table->integer('location_id');
            $table->string('challan_no');
            $table->string('delivered_place')->nullable();
            $table->string('delivered_date')->nullable();
            $table->string('status')->nullable();
            $table->string('received_by')->nullable();

                // $table->integer('item_id');
                //            $table->integer('stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
