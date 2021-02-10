<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'po_no' ,
        'po_date' ,
        'qc_no' ,
        'supplier_id' ,
        'quantity' ,
        'transaction_id',
        'item_id' ,
        'location_id' ,
        'challan_no',
        'delivered_place',
        'delivered_date',
        'received_by',
        'status',
        'prepared_by',
        'approved_by'
    ];

    //
}
