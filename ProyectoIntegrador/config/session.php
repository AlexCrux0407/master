<?php

use Illuminate\Support\Str;

return [

    'driver' => env('SESSION_DRIVER', 'file'),
    // Si quieres aún más seguridad, considera 'database' o 'redis'

    'lifetime' => env('SESSION_LIFETIME', 30),
    // Menor tiempo de sesión inactiva (30 minutos recomendado)

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', true),
    // Cierra la sesión al cerrar el navegador

    'encrypt' => env('SESSION_ENCRYPT', true),
    // ✅ Encripta los datos de la sesión en el almacenamiento

    'files' => storage_path('framework/sessions'),

    'connection' => env('SESSION_CONNECTION'),

    'table' => env('SESSION_TABLE', 'sessions'),

    'store' => env('SESSION_STORE'),

    'lottery' => [2, 100],
    // Mantén la limpieza de sesiones viejas

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    'path' => '/',

    'domain' => env('SESSION_DOMAIN', null),

    'secure' => env('SESSION_SECURE_COOKIE', true),
    // ✅ Cookies solo en HTTPS

    'http_only' => true,
    // ✅ Evita acceso por JavaScript

    'same_site' => 'strict',
    // ✅ Recomendado para mayor protección CSRF

    'partitioned' => false,
    // Puedes dejarlo así, a menos que manejes cross-site muy específicos
];