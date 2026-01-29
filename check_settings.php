<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$count = \App\Models\Setting::count();
echo "Settings count: " . $count . PHP_EOL;

if ($count > 0) {
    $settings = \App\Models\Setting::all(['key', 'group', 'value']);
    foreach ($settings as $s) {
        echo "{$s->group} | {$s->key} | {$s->value}" . PHP_EOL;
    }
}
