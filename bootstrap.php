<?php

spl_autoload_register(function ($class) {

    $prefix = 'App\\';
    $file = str_replace($prefix, '', $class);
    $file = str_replace('\\', '/', $file);
    $file = __DIR__ . '/src/'. $file . '.php';
    if (file_exists($file)) {
        require $file;
    }
});