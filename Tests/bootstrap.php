<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = require __DIR__. '/../vendor/.composer/autoload.php';
$loader->add('Ddeboer\\Salesforce\\MapperBundle', __DIR__ . '/../../../../');

AnnotationRegistry::registerLoader(function($class) use ($loader) {
    $result = $loader->loadClass($class);
    return class_exists($class, false);
});