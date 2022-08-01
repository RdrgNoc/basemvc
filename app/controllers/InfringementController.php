<?php

class InfringementController extends Controller
{
    private $model;
    private $modelPeople;
    private $modelVehicle;

    /**
     * @param $model
     */
    public function __construct()
    {
        $this->model = $this->model("InfringementModel");
        $this->modelPeople = $this->model("PeopleModel");
        $this->modelVehicle = $this->model("VehicleModel");
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
        $data['peoplesInput'] = $this->model->getAllPeoplesInput();
        $data['vehiclesInput'] = $this->model->getAllVehiclesInput();
        $data['conditionsInput'] = $this->model->getAllConditionsInput();
        $data['displayCreateInfringements'] = true;
        $this->view("InfringementView", $data);
    }
    public function registerInfringement()
    {
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $radOpc = $_POST['flexRadioDefault'];
            $data = array();
            $paramsVehicle = array();
            $paramsPeople = array();
            $paramsInfringement = array();
            $paramsNewInfringement = array();
            $date = date('y-m-d');

            if (isset($radOpc) == 1) {
                $paramsPeople = array(
                    'nombre' => $_POST['nombre'],
                    'paterno' => $_POST['paterno'],
                    'materno' => $_POST['materno'],
                    'direccion' => $_POST['direccion'],
                    'telefono' => $_POST['telefono'],
                    'edad' => $_POST['edad'],
                    'sexo' => $_POST['sexo']
                );
                $paramsVehicle = array(
                    'modelo' => $_POST['modelo'],
                    'marca' => $_POST['marca'],
                    'descripcion' => $_POST['descripcion'],
                    'no_circulacion' => $_POST['no_circulacion'],
                    'no_licencia' => $_POST['no_licencia'],
                    'matricula' => $_POST['matricula']
                );

                $errorsPeople = $this->modelPeople->checkErrors($paramsPeople);
                $errorsVehicle = $this->modelVehicle->checkErrors($paramsVehicle);

                if (count($errorsPeople) === 0 && count($errorsVehicle) === 0) {
                    $paramsPeople = array(
                        'nombre' => $_POST['nombre'],
                        'paterno' => $_POST['paterno'],
                        'materno' => $_POST['materno'],
                        'direccion' => $_POST['direccion'],
                        'telefono' => $_POST['telefono'],
                        'edad' => $_POST['edad'],
                        'sexo' => $_POST['sexo']
                    );
                    $paramsVehicle = array(
                        'modelo' => $_POST['modelo'],
                        'marca' => $_POST['marca'],
                        'descripcion' => $_POST['descripcion'],
                        'no_circulacion' => $_POST['no_circulacion'],
                        'no_licencia' => $_POST['no_licencia'],
                        'matricula' => $_POST['matricula']
                    );

                $dataPeople = $this->modelPeople->registry($paramsPeople);
                $dataVehicle = $this->modelVehicle->registry($paramsVehicle);
                } else {
                    $data['show_message_info'] = true;
                    $data['success'] = false;
                    $data['message'] = $errorsPeople;
                    $data['createVehicle'] = true;
                }

                if (isset($dataPeople['infoReturnPeople'])) {
                    $newIDP = $dataPeople['infoReturnPeople']['id'];
                }
                if (isset($dataVehicle['infoReturnVehicle'])) {
                    $newIDV = $dataVehicle['infoReturnVehicle']['id'];
                }

                if (empty($newIDP) && empty($newIDV)) {

                } else {
                    $paramsInfringement = array(
                        'opcion' => $radOpc,
                        'motivo' => $_POST['motivoNF'],
                        'multa' => $_POST['multaNF'],
                        'date' => $date,
                        'people' => $newIDP,
                        'vehicle' => $newIDV,
                        'conditions' => 1,
                    );
                }
                $errorsInfringement = $this->model->checkErrors($paramsInfringement);
                if (count($errorsInfringement) === 0) {
                    $paramsInfringement = array(
                        'opcion' => $radOpc,
                        'motivo' => $_POST['motivoNF'],
                        'multa' => $_POST['multaNF'],
                        'date' => $date,
                        'people' => $newIDP,
                        'vehicle' => $newIDV,
                        'conditions' => 1,
                    );
                    $data = $this->model->registry($paramsInfringement);
                } else {
                    $data['show_message_info'] = true;
                    $data['success'] = false;
                    $data['message'] = $errorsInfringement;
                    $data['createVehicle'] = true;
                }
            }
            if (isset($radOpc) == 2) {
                $paramsNewInfringement = array(
                    'opcion' => $radOpc,
                    'motivo' => $_POST['motivoNA'],
                    'multa' => $_POST['multaNA'],
                    'date' => $date,
                    'people' => $_POST['people'],
                    'vehicle' => $_POST['vehicle'],
                    'conditions' => $_POST['conditions'],
                );

                $errorsInfringement = $this->model->checkErrors($paramsNewInfringement);

                if (count($errorsInfringement) === 0) {
                    $paramsNewInfringement = array(
                        'opcion' => $radOpc,
                        'motivo' => $_POST['motivoNA'],
                        'multa' => $_POST['multaNA'],
                        'date' => $date,
                        'people' => $_POST['people'],
                        'vehicle' => $_POST['vehicle'],
                        'conditions' => $_POST['conditions'],
                    );

                    $data = $this->model->registry($paramsNewInfringement);
                } else {
                    $data['show_message_info'] = true;
                    $data['success'] = false;
                    $data['message'] = $errorsInfringement;
                    $data['createVehicle'] = true;
                }
            }
            if (isModeDebug()) {
                writeLog(INFO_LOG, "Infringement/registerInfringement", json_encode($data));
            }
            $data['displayCreateInfringements'] = true;
            $this->view("InfringementView", $data);
        }
    }
}