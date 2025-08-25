<?php

use App\Controllers\PageController;

return [
    'routes' => [

        // original pages
            '' => [PageController::class, 'home'],

        // errors pages
        '403' => [PageController::class, 'show403'],

        // handlers
        // ...
    ],

    'noBuilderPages' => [

        // min layout pages
        'pagesWithLayout' => [],

        // no layout pages
        'pagesWithoutLayout' => [],
    ]
];
