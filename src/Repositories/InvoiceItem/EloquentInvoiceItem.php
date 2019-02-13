<?php

namespace Viviniko\Purchase\Repositories\InvoiceItem;

use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentInvoiceItem extends EloquentRepository implements InvoiceItemRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('purchase.invoice_item'));
    }
}