<?php

namespace Viviniko\Purchase\Services\Impl;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Viviniko\Purchase\Enums\TaskStatus;
use Viviniko\Purchase\Repositories\Task\TaskRepository;
use Viviniko\Repository\SearchPageRequest;

class TaskServiceImpl implements TaskService
{
    protected $tasks;

    /**
     * Instance of the event dispatcher.
     *
     * @var \Illuminate\Contracts\Events\Dispatcher
     */
    protected $events;

    public function __construct(
        TaskRepository $tasks,
        Dispatcher $events)
    {
        $this->tasks = $tasks;
        $this->events = $events;
    }

    public function paginate($pageSize, $wheres = [], $orders = [])
    {
        return $this->tasks->search(
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

    public function getTask($id)
    {
        return $this->tasks->find($id);
    }
}