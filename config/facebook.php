<?php
return [
    'app' => [
        'id' => env('FACEBOOK_APP_ID',''),
        'secret' => env('FACEBOOK_APP_SECRET',''),
    ],
    'registration' => [
        'facebook_id' => env('FACEBOOK_ID_COLUMN', 'facebook_id'),
        'email'       => env('EMAIL_COLUMN', 'email'),
        'first_name'  => env('FIRST_NAME_COLUMN', 'first_name'),
        'last_name'   => env('LAST_NAME_COLUMN', 'last_name'),
        'name'        => env('NAME_COLUMN', 'name'),
        'attach_role' => env('ATTACH_ROLE', 5),
    ]
];
