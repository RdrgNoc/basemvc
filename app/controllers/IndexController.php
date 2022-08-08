<?php

class IndexController extends Controller
{

    private $model;

    function __construct()
    {
        
    }

    function display()
    {
        $data = array();
        //$data['display_login'] = true;
        //$this->view("LoginView", $data);
        $this->view("IndexView");
    }
}
