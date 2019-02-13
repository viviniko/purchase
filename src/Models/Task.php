<?php

namespace Viviniko\Purchase\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class Task extends Model
{
    protected $tableConfigKey = 'purchase.tasks_table';

    protected $fillable = [
        'order_id', 'item_id', 'quantity', 'status', 'item_specs', 'trace',
    ];

    public function order()
    {
        return $this->belongsTo(Config::get('sale.order'), 'order_id');
    }

    public function item()
    {
        return $this->belongsTo(Config::get('catalog.item'), 'item_id');
    }

    public function invoices()
    {
        return $this->hasMany(Config::get('purchase.invoice'), 'task_id');
    }
}