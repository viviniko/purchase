<?php

namespace Viviniko\Purchase\Repositories\Invoice;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Viviniko\Repository\EloquentRepository;

class EloquentInvoice extends EloquentRepository implements InvoiceRepository
{
    public function __construct()
    {
        parent::__construct(Config::get('purchase.invoice'));
    }
}