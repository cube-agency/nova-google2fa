<?php

return [

    'register' => [
        'title' => 'Two-factor authentication',
        'description' => 'Two factor authentication (2FA) strengthens access security by requiring two methods (also
            referred
            to as factors) to verify your identity. Two factor authentication protects against phishing, social
            engineering and password brute force attacks and secures your logins from attackers exploiting weak
            or stolen credentials.',
        'instruction_description' => 'To enable two-factor authentication on your account, you need to do following steps:',
        'step_one' => '1. Open the Google Authenticator app and scan the QR code OR copy this code :secret and paste it into the Google authenticator app to setup manually',
        'step_two' => '2. After successful setup, enter the code generated in the app in the field provided below'
    ],

    'login' => [
        'instructions_description' => 'Enter the code from Google Authenticator app'
    ],

    'setup' => [
        'install' => 'Please install Google Authenticator app to be able to finish 2FA setup and log in.',
        'recovery_title' => 'Recovery codes',
        'recovery_description' => 'Recovery codes are used to access your account in the event you cannot receive two-factor authentication codes.',
        'recovery_warning' => 'Download, print or copy your codes and store them in a safe place before continuing two-factor authentication setup. DO NOT loose them as that will result in you being locked out of your account.'
    ],

    'recovery' => [
        'instructions_description' => 'Enter one of the recovery codes provided to you when two-factor authentication was being setup for this account'
    ],

    'actions' => [
        'login' => 'Login',
        'continue' => 'Continue to setup',
        'print' => 'Print',
        'confirm' => 'Confirm',
        'recovery_login' => 'Log in using recovery code?',
        'reset' => 'Reset two-factor auth',
    ],

    'fields' => [
        'one_time_password' => 'Authentication code',
        'recovery_code' => 'Recovery code',
    ],

    'validation' => [
        'otp_invalid' =>  'One time password is invalid.',
        'recovery_code_invalid' => 'Recovery code is invalid.',
    ]

];
