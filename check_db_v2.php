<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$count = \App\Models\Setting::count();
$output = "Settings count: " . $count . PHP_EOL;

if ($count > 0) {
    $settings = \App\Models\Setting::all(['key', 'group', 'value']);
    foreach ($settings as $s) {
        $output .= "{$s->group} | {$s->key} | {$s->value}" . PHP_EOL;
    }
} else {
    $output .= "No settings found in database." . PHP_EOL;
}

file_put_contents('db_check_result.txt', $output);
echo "Check completed. Result written to db_check_result.txt" . PHP_EOL;
