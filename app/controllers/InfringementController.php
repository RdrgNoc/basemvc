<?php

class InfringementController extends Controller
{
    private $model;

    /**
     * @param $model
     */
    public function __construct()
    {
        $this->model = $this->model("InfringementModel");
    }

    public function display(){
        isLogged();
        $data = array();
        $data = $this->model->displayInfringement();
        $data['displayAllInfringements'] = true;
        $this->view("InfringementView", $data);
    }

    public function create(){
        isLogged();
        $data = array();
        $data['displayCreateInfringements'] = true;
        $this->view("InfringementView", $data);
    }

}