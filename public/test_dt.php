<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/dashboard', 'GET', [
    'draw' => 1,
    'start' => 0,
    'length' => 10,
    'search' => ['value' => '']
]);
$request->headers->set('X-Requested-With', 'XMLHttpRequest');

$response = $kernel->handle($request);
echo $response->getContent();
