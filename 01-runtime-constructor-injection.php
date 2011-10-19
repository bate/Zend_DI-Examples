<?php

namespace MovieApp {
    class Lister {
        public $finder;
        public function __construct(Finder $finder){
            $this->finder = $finder;
        }
    }
    class Finder {
        
    }
}

namespace {
    include 'Zend_Di-2.0.0beta1.phar';
    $di = new Zend\Di\Di;
    $lister = $di->get('MovieApp\Lister');
    
    // expression to test
    $works = ($lister->finder instanceof MovieApp\Finder);
    
    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!');
}
