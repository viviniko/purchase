<?php

namespace Viviniko\Purchase\Services\Impl;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Viviniko\Purchase\Repositories\Invoice\InvoiceRepository;
use Viviniko\Purchase\Repositories\InvoiceItem\InvoiceItemRepository;
use Viviniko\Purchase\Services\InvoiceService;
use Viviniko\Repository\SearchPageRequest;

class InvoiceServiceImpl implements InvoiceService
{
    protected $invoices;

    protected $invoiceItems;

    /**
     * Instance of the event dispatcher.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $events;

    public function __construct(
        InvoiceRepository $invoices,
        InvoiceItemRepository $invoiceItems)
    {
        $this->invoices = $invoices;
        $this->invoiceItems = $invoiceItems;
    }

    public function paginate($pageSize, $wheres = [], $orders = [])
    {
        return $this->invoices->search(
            SearchPageRequest::create($pageSize, $wheres, $orders)
                ->rules([
                    'id',
                    'order_id',
                    'item_id',
                    'status',
                    'trace' => 'like',
                    'created_at' => 'betweenDate',
                ])
                ->request(request(), 'search')
        );
    }

    /**
     * Get invoice.
     *
     * @param $id
     * @return mixed
     */
    public function getInvoice($id)
    {
        return $this->invoices->find($id);
    }

    public function createInvoice(array $data)
    {
        return $this->invoices->create($data);
    }

    public function updateInvoice($id, array $data)
    {
        return $this->invoices->update($id, $data);
    }
}