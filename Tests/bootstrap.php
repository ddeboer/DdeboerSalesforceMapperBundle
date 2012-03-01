<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__. '/../vendor/.composer/autoload.php';

spl_autoload_register(function($class) {
    if (0 === strpos($class, 'Ddeboer\\Salesforce\\MapperBundle\\')) {
        $path = __DIR__.'/../'.implode('/', array_slice(explode('\\', $class), 3)).'.php';

        if (!stream_resolve_include_path($path)) {
            return false;
        }
        require_once $path;
        return true;
    }
});

AnnotationRegistry::registerLoader(function($class) use ($loader) {
    spl_autoload_call($class);
    return class_exists($class, false);
});