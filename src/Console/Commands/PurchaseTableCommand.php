<?php

namespace Viviniko\Purchase\Console\Commands;

use Viviniko\Support\Console\CreateMigrationCommand;

class PurchaseTableCommand extends CreateMigrationCommand
{
    /**
     * @var string
     */
    protected $name = 'purchase:table';

    /**
     * @var string
     */
    protected $description = 'Create a migration for the purchase service table';

    /**
     * @var string
     */
    protected $stub = __DIR__ . '/stubs/purchase.stub';

    /**
     * @var string
     */
    protected $migration = 'create_purchase_table';
}
