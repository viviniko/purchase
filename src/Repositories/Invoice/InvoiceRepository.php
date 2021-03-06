<?php

namespace Viviniko\Purchase\Repositories\Invoice;

use Viviniko\Repository\SearchRequest;

interface InvoiceRepository
{
    /**
     * Search.
     *
     * @param SearchRequest $searchRequest
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Collection
     */
    public function search(SearchRequest $searchRequest);

    /**
     * Get order.
     *
     * @param $column
     * @param null $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($column, $value = null, $columns = ['*']);

    /**
     * Find data by id
     *
     * @param       $id
     *
     * @return mixed
     */
    public function find($id);

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

    /**
     * Delete a entity in repository by id
     *
     * @param        $id
     *
     * @return mixed
     */
    public function delete($id);
}