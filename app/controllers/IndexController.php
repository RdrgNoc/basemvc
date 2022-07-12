<?php

class IndexController extends Controller
{

    private $model;

    function __construct()
    {
        
    }

    function display()
    {
        $this->view("IndexView");
    }
}
