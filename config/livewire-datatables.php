<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Carbon Formats
    |--------------------------------------------------------------------------
    | The default formats that are used for TimeColumn & DateColumn.
    | You can use the formatting characters from the PHP DateTime class.
    | More info: https://www.php.net/manual/en/datetime.format.php
    |
    */

    'default_time_format' => 'H:i',
    'default_date_format' => 'd/m/Y',
    'default_datetime_format' => 'd/m/Y H:i',

    /*
    |--------------------------------------------------------------------------
    | Default Carbon Formats
    |--------------------------------------------------------------------------
    | The default formats that are used for TimeColumn & DateColumn.
    | You can use the formatting characters from the PHP DateTime class.
    | More info: https://www.php.net/manual/en/datetime.format.php
    |
    */

    'default_time_start' => '0000-00-00',
    'default_time_end' => '9999-12-31',

    // Defaults that work with smalldatetime in SQL Server
    //  'default_time_start' => '1900-01-01',
    //  'default_time_end' => '2079-06-06',

    /*
    |--------------------------------------------------------------------------
    | Surpress Search Highlights
    |--------------------------------------------------------------------------
    | When enabled, matching text won't be highlighted in the search results
    | while searching.
    |
    */

    'suppress_search_highlights' => false,

    /*
    |--------------------------------------------------------------------------
    | Per Page Options
    |--------------------------------------------------------------------------
    | Sets the options to choose from in the `Per Page`dropdown.
    |
    */

    'per_page_options' => [10, 25, 50, 100],

    /*
    |--------------------------------------------------------------------------
    | Default Per Page
    |--------------------------------------------------------------------------
    | Sets the default amount of rows to display per page.
    |
    */

    'default_per_page' => 10,

    /*
    |--------------------------------------------------------------------------
    | Model Namespace
    |--------------------------------------------------------------------------
    | Sets the default namespace to be used when generating a new Datatables
    | component.
    |
    */

    'model_namespace' => 'App/Models',

    /*
    |--------------------------------------------------------------------------
    | Default Sortable
    |--------------------------------------------------------------------------
    | Should a column of a datatable be sortable by default ?
    |
    */

    'default_sortable' => true,

    /*
    |--------------------------------------------------------------------------
    | Default CSS classes
    |--------------------------------------------------------------------------
    |
    | Sets the default classes that will be applied to each row and class
    | if the rowClasses() and cellClasses() functions are not overrided.
    |
    */

    'default_classes' => [
        'row' => [
            'even' => 'text-sm text-primary-dark bg-primary dark:text-primary dark:bg-primary-dark',
            'odd' => 'text-sm text-secondary-dark bg-priary dark:text-secondary dark:bg-secondary-dark',
            'selected' => 'text-sm text-primary bg-accent dark:bg-accent-dark',
        ],
        'cell' => 'whitespace-no-wrap text-sm px-6 py-2',
    ],

    'default_buttons' => [
        'show',
        'edit',
        'delete'
    ]
];
