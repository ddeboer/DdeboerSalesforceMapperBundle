<?php
$vendorDir = __DIR__ . '/../vendor';

if (!@include($vendorDir . '/.composer/autoload.php')) {
    die("You must set up the project dependencies, run the following commands:
wget http://getcomposer.org/composer.phar
php composer.phar install
");
} 

$loader = require $vendorDir .  '/.composer/autoload.php';

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

Doctrine\Common\Annotations\AnnotationRegistry::registerLoader(function($class) use ($loader) {
    spl_autoload_call($class);
    return class_exists($class, false);
});