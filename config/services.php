<?php

return [

    'github' => [
        'token' => env('GITHUB_TOKEN'),
        'files' => env('GITHUB_FILES'),
        'hook_secret' => env('GITHUB_HOOK_SECRET'),
        'username' => env('GITHUB_USERNAME'),
    ],

    'last-fm' => [
        'api_key' => env('LAST_FM_API_KEY'),
        'users' => explode(',', env('LAST_FM_USERS')),
    ],

    'packagist' => [
        'vendor' => env('PACKAGIST_VENDOR'),
    ],

    'dailyinfo' => [
        'secret' => env('DAILYINFO_API_SECRET'),
    ],
    'trello' => [
        'api_key' => env('TRELLO_API_KEY'),
        'todos_board_id' => env('TRELLO_TODOS_BOARD_ID'),
    ],
];
