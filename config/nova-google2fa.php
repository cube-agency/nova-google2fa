<?php

use CubeAgency\NovaGoogle2fa\Models\User2fa;

return [
    /**
     * Disable or enable middleware.
     */
    'enabled' => env('GOOGLE_2FA_ENABLED', true),

    'models' => [
        /**
         * Change this variable to path to user model.
         */
        'user'    => 'App\User',

        /**
         * Change this if you need a custom connector
         */
        'user2fa' => User2fa::class,
    ],
    'tables' => [
        /**
         * Table in which users are stored.
         */
        'user' => 'users',
    ],

    'recovery_codes' => [
        /**
         * Number of recovery codes that will be generated.
         */
        'count'             => 8,

        /**
         * Number of blocks in each recovery code.
         */
        'blocks'            => 3,

        /**
         * Number of characters in each block in recovery code.
         */
        'chars_in_block'    => 16,
    ],

    'recovery_input' => 'recovery_code',

    'app_store_links' => [
        'android' => 'https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US',
        'ios' => 'https://apps.apple.com/lv/app/google-authenticator/id388497605',
    ]
];
