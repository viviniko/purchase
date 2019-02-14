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
use Viviniko\Purchase\Services\TaskService;
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

    public function createTask(array $data)
    {
        return $this->tasks->create($data);
    }

    public function updateTask($id, array $data)
    {
        if (!empty($data['trace'])) {
            $task = $this->getTask($id);
            $trace = sprintf('[%s]%s: %s', date('Y-m-d H:i:s'), Auth::user()->first_name . ' ' . Auth::user()->last_name, $data['trace']);
            $data['traces'] = $task->traces;
            $data['traces'][] = $trace;
        }
        return $this->tasks->update($id, $data);
    }

    public function deleteTask($id)
    {
        return $this->tasks->delete($id);
    }

    public function getTasksIn(array $id)
    {
        return $this->tasks->findAllBy('id', $id);
    }
}