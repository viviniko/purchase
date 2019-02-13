<?php

namespace Viviniko\Purchase\Models;

use Illuminate\Support\Facades\Config;
use Viviniko\Support\Database\Eloquent\Model;

class Task extends Model
{
    protected $tableConfigKey = 'purchase.tasks_table';

    protected $fillable = [
        'order_id', 'item_id', 'quantity', 'status', 'trace'
    ];

    public function invoices()
    {
        return $this->hasMany(Config::get('purchase.invoice'), 'task_id');
    }
}