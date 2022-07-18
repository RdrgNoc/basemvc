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
    public function create()
    {
        isLogged();
        $data = array();
        $data['createVehicle'] = true;
        $this->view("VehicleView", $data);
    }
    public function registerVehicle()
    {
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $data = array();
            $params = array(
                'modelo' => $_POST['modelo'],
                'marca' => $_POST['marca'],
                'descripcion' => $_POST['descripcion'],
                'no_circulacion' => $_POST['no_circulacion'],
                'no_licencia' => $_POST['no_licencia'],
                'matricula' => $_POST['matricula']
            );

            $errors = $this->model->checkErrors($params);

            if (count($errors) === 0) {
                $params = array(
                    'modelo' => $_POST['modelo'],
                    'marca' => $_POST['marca'],
                    'descripcion' => $_POST['descripcion'],
                    'no_circulacion' => $_POST['no_circulacion'],
                    'no_licencia' => $_POST['no_licencia'],
                    'matricula' => $_POST['matricula']
                );

                $data = $this->model->registry($params);
            } else {
                $data['show_message_info'] = true;
                $data['success'] = false;
                $data['message'] = $errors;
                $data['createVehicle'] = true;
            }

            if (isModeDebug()) {
                writeLog(INFO_LOG, "VehicleController/registerVehicle", json_encode($data));
            }
            $data['createVehicle'] = true;
            $this->view("VehicleView", $data);
        }
    }
}