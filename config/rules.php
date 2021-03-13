<?php

return [
    // Validations
    'login' => [
        'email' => 'required|email',
        'password' => 'required'
    ],
    'client' => [
        'concessionaire_id' => 'required',
        'name' => 'required|string',
        'last_name' => 'required|string',
        'identification' => 'required|string'
    ]
];