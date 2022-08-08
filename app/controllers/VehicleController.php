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
            $params = array();
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

    public function delete($id_vehicle)
    {
        isLogged();
        $params = array(
            'id_vehicle' => intval(filter_var($id_vehicle, FILTER_SANITIZE_NUMBER_INT))
        );
        $data = $this->model->delete($params);
        if ($data['success']) {
            $data['message'] = "Vehiculo eliminado correctamente";
            $data = $this->model->displayVehicles();
        } else {
            $data['message'] = "Vehiculo no se elimino correctamente";
        }
        $data['createVehicle'] = true;
        $this->view("VehicleView", $data);
    }

    public function editVehicle($id_vehicle)
    {
        isLogged();
        $data = array();
        $params = array(
            'id_vehicle' => intval(filter_var($id_vehicle, FILTER_SANITIZE_NUMBER_INT))
        );
        $data = $this->model->getInfoVehicle($params);
        $data['editVehicle'] = true;
        if (isModeDebug()) {
            writeLog(INFO_LOG, "VehicleController/editVehicle", json_encode($data));
        }
        $this->view("VehicleView", $data);
    }

    public function edit()
    {
        isLogged();
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $data = array();
            $params = array(
                'modelo' => $_POST['modelo'],
                'marca' => $_POST['marca'],
                'descripcion' => $_POST['descripcion'],
                'no_circulacion' => $_POST['no_circulacion'],
                'no_licencia' => $_POST['no_licencia'],
                'matricula' => $_POST['matricula'],
                'id_vehicle' => filter_var($_POST['id_vehicle'], FILTER_SANITIZE_NUMBER_INT)
            );

            $errors = $this->model->checkErrors($params);

            if (count($errors) === 0) {

                $params = array(
                    'modelo' => $_POST['modelo'],
                    'marca' => $_POST['marca'],
                    'descripcion' => $_POST['descripcion'],
                    'no_circulacion' => $_POST['no_circulacion'],
                    'no_licencia' => $_POST['no_licencia'],
                    'matricula' => $_POST['matricula'],
                    'id_vehicle' => $_POST['id_vehicle'],
                );

                $data = $this->model->edit($params);
                if ($data['success']) {
                    $data = $this->model->displayVehicles();
                    $data['message'] = "Registro editado correctamente";
                } else {
                    $data['message'] = "El registro no se actualizo";
                }
            } else {
                $data['info_vehicle'] = array(
                    'modelo' => $_POST['name'],
                    'marca' => $_POST['surname'],
                    'descripcion' => $_POST['nickname'],
                    'no_circulacion' => $_POST['email'],
                    'no_licencia' => $_POST['rol'],
                    'id' => filter_var($_POST['id_vehicle'], FILTER_SANITIZE_NUMBER_INT),
                    'matricula' => $_POST['matricula']
                );

                $data['show_message_info'] = true;
                $data['success'] = false;
                $data['message'] = $errors;
                $data['editVehicle'] = true;
            }
            if (isModeDebug()) {
                writeLog(INFO_LOG, "VehicleController/edit", json_encode($data));
            }
            $data['displayAllVehicles'] = true;
            $this->view("VehicleView", $data);
        }
    }
}