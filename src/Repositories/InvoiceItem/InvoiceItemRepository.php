<?php

namespace Viviniko\Purchase\Repositories\InvoiceItem;

interface InvoiceItemRepository
{
    /**
     * Create data
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Update a entity in repository by id
     *
     * @param       $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data);
}