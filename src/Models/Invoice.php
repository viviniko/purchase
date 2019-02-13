<?php

namespace Viviniko\Purchase\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $tableConfigKey = 'purchase.invoices_table';

    protected $fillable = [
        'task_id', 'invoice_number', 'discount', 'subtotal', 'shipping', 'total', 'status'
    ];

    public function task()
    {
        return $this->belongsTo(Config::get('purchase.task'), 'task_id');
    }

    public function items()
    {
        return $this->hasMany(Config::get('purchase.invoice_item'), 'invoice_id');
    }
}