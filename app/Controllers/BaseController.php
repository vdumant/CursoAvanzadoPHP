<?php

namespace App\Controllers;

// use \Twig_Loader_Filesystem;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Zend\Diactoros\Response\HtmlResponse;
class BaseController {
    protected $templateEngine;

    public function __construct() {
        $loader = new FilesystemLoader('../views');
        $this->templateEngine = new Environment($loader, array(
            'debug' => true,
            'cache' => false,
        ));
    }

    public function renderHTML($fileName, $data = []) {
        return new HtmlResponse($this->templateEngine->render($fileName, $data));
    }
}