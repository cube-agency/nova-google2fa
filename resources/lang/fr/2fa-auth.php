<?php

return [

    'register' => [
        'title' => 'Two-factor authentication',
        'description' => "L'authentification à deux facteurs (2FA) renforce la sécurité d'accès en exigeant deux méthodes (double Authentification)
            pour vérifier votre identité. L'authentification à deux facteurs vous protège contre le phishing, l'ingénierie sociale et les attaques par force brute.
            d'hameçonnage, d'ingénierie sociale et de force brute des mots de passe et protège vos connexions contre les attaquants qui exploitent des informations d'identification faibles ou volées.
            ou volés. Traduit avec www.DeepL.com/Translator (version gratuite)",
        'instruction_description' => "Pour activer l'authentification à deux facteurs sur votre compte, vous devez suivre les étapes suivantes :",
        'step_one' => "1. Ouvrez l'application Google Authenticator et scannez le code QR OU copiez ce code :secret et collez-le dans l'application Google Authenticator pour le configurer manuellement.",
        'step_two' => "2. Une fois l'installation réussie, entrez le code généré dans l'application dans le champ prévu ci-dessous."
    ],

    'login' => [
        'instructions_description' => "Entrer le code depuis l'application Google Authenticator"
    ],

    'setup' => [
        'install' => "Veuillez installer l'application Google Authenticator pour pouvoir terminer la configuration du système 2FA et vous connecter.",
        'recovery_title' => 'Codes de récupération',
        'recovery_description' => "Les codes de récupération sont utilisés pour accéder à votre compte dans le cas où vous ne pouvez pas recevoir les codes d'authentification à deux facteurs.",
        'recovery_warning' => "Téléchargez, imprimez ou copiez vos codes et conservez-les dans un endroit sûr avant de poursuivre la configuration de l'authentification à deux facteurs. NE les perdez PAS, car vous risqueriez d'être bloqué dans votre compte."
    ],

    'recovery' => [
        'instructions_description' => "Entrez l'un des codes de récupération qui vous ont été fournis lors de la configuration de l'authentification à deux facteurs pour ce compte."
    ],

    'actions' => [
        'login' => 'Connexion',
        'continue' => 'Continue de configurer',
        'print' => 'Print',
        'confirm' => 'Confirmer',
        'recovery_login' => 'Se connecter avec le code de récupération?',
        'reset' => 'Réinitialiser two-factor auth',
    ],

    'fields' => [
        'one_time_password' => "Code d'authentication",
        'recovery_code' => 'Code de récupération',
    ],

    'validation' => [
        'otp_invalid' =>  'One time password is invalid.',
        'recovery_code_invalid' => 'Recovery code is invalid.',
    ]

];
