<?php

return [
    'task' => 'Viviniko\Purchase\Models\Task',

    'invoice' => 'Viviniko\Purchase\Models\Invoice',

    'invoice_item' => 'Viviniko\Purchase\Models\InvoiceItem',

    /*
    |--------------------------------------------------------------------------
    | Purchase Invoice Table
    |--------------------------------------------------------------------------
    |
    | This is the purchase_invoices table.
    |
    */
    'invoices_table' => 'purchase_invoices',

    /*
    |--------------------------------------------------------------------------
    | Purchase Invoice Item Table
    |--------------------------------------------------------------------------
    |
    | This is the purchase_invoice_items table.
    |
    */
    'invoice_items_table' => 'purchase_invoice_items',

    /*
    |--------------------------------------------------------------------------
    | Purchase Task Table
    |--------------------------------------------------------------------------
    |
    | This is the purchase_tasks table.
    |
    */
    'tasks_table' => 'purchase_tasks',
];