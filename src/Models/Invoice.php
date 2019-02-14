<?php

namespace Viviniko\Purchase\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $tableConfigKey = 'purchase.invoices_table';

    protected $fillable = [
        'invoice_number', 'discount', 'subtotal', 'shipping', 'total', 'status', 'manufacturer', 'created_by'
    ];

    public function items()
    {
        return $this->hasMany(Config::get('purchase.invoice_item'), 'invoice_id');
    }
}