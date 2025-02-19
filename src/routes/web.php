<?php

use Illuminate\Support\Facades\Route;
use Tipusultan\WhatsappApi\WhatsappService;

Route::post('/whatsapp/send', function (WhatsappService $service) {
    request()->validate([
        'number' => 'required',
        'message' => 'required',
    ]);

    return $service->sendMessage(request('number'), request('message'));
});

Route::get('/whatsapp/test', function (WhatsappService $service) {
    return response()->json($service->sendMessage(
        '8801716720487',
        'Hello World!',
        'Sent via WhatsApp API'
    ));
});