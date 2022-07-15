<?php

class VehicleController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = $this->model("VehicleModel");
    }

    public function display(){
        isLogged();

        $data = array();

        $data = $this->model->displayVehicles();

        $data['displayAllVehicles'] = true;

        $this->view("VehicleView", $data);
    }
}