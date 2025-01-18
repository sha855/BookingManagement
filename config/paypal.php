<?php

return [
    // Other service configurations...

    'paypal' => [
        'client_id' => env('PAYPAL_CLIENT_ID','AXRXOe-EIbwNKuWdIROwe8sI82DI0N-HgKzKfBVQR8iwtoSPLBu0Ki0F5gXH-_SRTzUtSXcKM5PCdn3K'),
        'secret' => env('PAYPAL_SECRET','EM2-qUTYSBlgdyxYaMdnmvYTdZ1f7nVLF4dUoiDsswtAzqcXwoSSu7XFmINzaFr6OarQJQlB0hZQ2doq'),
        'mode' => env('PAYPAL_MODE', 'sandbox'), // Defaults to sandbox if not specified
    ],
];