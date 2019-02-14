<?php

namespace Viviniko\Purchase\Repositories\Task;

use Viviniko\Repository\SearchRequest;

interface TaskRepository
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
     * Get all task.
     *
     * @param $column
     * @param null $value
     * @param array $columns
     * @return mixed
     */
    public function findAllBy($column, $value = null, $columns = ['*']);

    /**
     * Get task.
     *
     * @param $column
     * @param null $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($column, $value = null, $columns = ['*']);

    /**
     * Create new task.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * Find data by id
     *
     * @param       $id
     *
     * @return mixed
     */
    public function find($id);

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