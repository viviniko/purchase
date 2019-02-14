<?php

namespace Viviniko\Purchase\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $tableConfigKey = 'purchase.invoice_items_table';

    protected $fillable = [
        'invoice_id', 'item_id', 'amount', 'quantity', 'status', 'item_specs'
    ];
}