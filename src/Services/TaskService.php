<?php

namespace Viviniko\Purchase\Services;

interface TaskService
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
     * Get task.
     *
     * @param $id
     * @return mixed
     */
    public function getTask($id);
}