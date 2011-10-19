<?php

include 'Zend_Di-2.0.0beta1.phar';

// must register autoloader
spl_autoload_register(function ($class) {
    if (strpos($class, 'Foo\Bar') !== 0) {
        return;
    }
    include_once __DIR__ . '/10/' . str_replace('\\', '/', substr($class, 7)) . '.php';
});


// compile phase
$compiler = new Zend\Di\Definition\CompilerDefinition();
$compiler->addDirectory(__DIR__ . '/10/');
$compiler->compile();
$arrayDef = $compiler->toArrayDefinition();    

$definitions = new Zend\Di\DefinitionList($arrayDef);
$di = new Zend\Di\Di($definitions);

$baz = $di->get('Foo\Bar\Baz');

// expression to test
$works = ($baz->bam instanceof Foo\Bar\Bam);

// display result
echo (($works) ? 'It works!' : 'It DOES NOT work!');
