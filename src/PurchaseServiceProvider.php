<?php

namespace Viviniko\Purchase;

use Viviniko\Purchase\Console\Commands\PurchaseTableCommand;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class PurchaseServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/../config/purchase.php' => config_path('purchase.php'),
        ]);

        // Register commands
        $this->commands('command.purchase.table');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/purchase.php', 'sale');

        $this->registerRepositories();

        $this->registerServices();

        $this->registerCommands();
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->singleton('command.purchase.table', function ($app) {
            return new PurchaseTableCommand($app['files'], $app['composer']);
        });
    }

    protected function registerRepositories()
    {
        $this->app->singleton(
            \Viviniko\Purchase\Repositories\Task\TaskRepository::class,
            \Viviniko\Purchase\Repositories\Task\EloquentTask::class
        );

        $this->app->singleton(
            \Viviniko\Purchase\Repositories\Invoice\InvoiceRepository::class,
            \Viviniko\Purchase\Repositories\Invoice\EloquentInvoice::class
        );

        $this->app->singleton(
            \Viviniko\Purchase\Repositories\InvoiceItem\InvoiceItemRepository::class,
            \Viviniko\Purchase\Repositories\InvoiceItem\EloquentInvoiceItem::class
        );
    }

    /**
     * Register the cart service provider.
     *
     * @return void
     */
    protected function registerServices()
    {
        $this->app->singleton(
            \Viviniko\Purchase\Services\TaskService::class,
            \Viviniko\Purchase\Services\Impl\TaskServiceImpl::class
        );

        $this->app->singleton(
            \Viviniko\Purchase\Services\InvoiceService::class,
            \Viviniko\Purchase\Services\Impl\InvoiceServiceImpl::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            \Viviniko\Purchase\Services\TaskService::class,
            \Viviniko\Purchase\Services\InvoiceService::class,
        ];
    }
}