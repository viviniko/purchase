<?php

namespace Viviniko\Purchase\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $tableConfigKey = 'purchase.invoice_items_table';

    protected $fillable = [
        'invoice_id', 'task_id', 'amount', 'quantity', 'note', 'status'
    ];

    public function task()
    {
        return $this->belongsTo(Config::get('purchase.task'), 'task_id');
    }
}