<?php
return [
    'PUBLIC_PLATFORM_URL' => env('PUBLIC_PLATFORM_URL', 'https://school.vratsasoftware.com'),

    /* logo - vsc, digitalmontana, digitalsmoliyan */
    'LOGO' => env('APP_LOGO', 'vsc'),

    'PHONE' => env('PHONE', '+359 88 207 6174'),

    'MAIL_FROM' => env('MAIL_FROM', 'school@vratsasoftware.com'),

    /* roles */
    'USER_ROLE_ADMIN' => 1,
    'USER_ROLE_USER' => 2,
    'USER_ROLE_LECTURER' => 3,
];
