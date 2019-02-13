<?php

namespace Viviniko\Purchase\Services;

interface InvoiceService
{
    /**
     * Paginate the given query into a simple paginator.
     *
     * @param $pageSize
     * @param array $wheres
     * @param array $orders
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($pageSize, $wheres = [], $orders = []);

    /**
     * Get invoice.
     *
     * @param $id
     * @return mixed
     */
    public function getInvoice($id);

    public function createInvoice(array $data);

    public function updateInvoice($id, array $data);

}