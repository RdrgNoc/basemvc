<?php

class PeopleController extends Controller
{
    private $model;

    /**
     * @param $model
     */
    public function __construct()
    {
        $this->model = $this->model("PeopleModel");
    }

    public function display(){
        isLogged();
        $data = array();
        $data = $this->model->displayPeoples();
        $data['displayAllPeoples'] = true;
        $this->view("PeopleView", $data);
    }
    public function create()
    {
        isLogged();
        $data = array();
        $data['createPeople'] = true;
        $this->view("PeopleView", $data);
    }
    public function registerPeople()
    {
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $data = array();
            $params = array();
            $params = array(
                'nombre' => $_POST['nombre'],
                'paterno' => $_POST['paterno'],
                'materno' => $_POST['materno'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'edad' => $_POST['edad'],
                'sexo' => $_POST['sexo']
            );

            $errors = $this->model->checkErrors($params);

            if (count($errors) === 0) {
                $params = array(
                    'nombre' => $_POST['nombre'],
                    'paterno' => $_POST['paterno'],
                    'materno' => $_POST['materno'],
                    'direccion' => $_POST['direccion'],
                    'telefono' => $_POST['telefono'],
                    'edad' => $_POST['edad'],
                    'sexo' => $_POST['sexo']
                );

                $data = $this->model->registry($params);
            } else {
                $data['show_message_info'] = true;
                $data['success'] = false;
                $data['message'] = $errors;
                $data['createVehicle'] = true;
            }

            if (isModeDebug()) {
                writeLog(INFO_LOG, "PeopleController/registerPeople", json_encode($data));
            }
            $data['createPeople'] = true;
            $this->view("PeopleView", $data);
        }
    }
    public function delete($id_people)
    {
        isLogged();
        $params = array(
            'id_people' => intval(filter_var($id_people, FILTER_SANITIZE_NUMBER_INT))
        );
        $data = $this->model->delete($params);
        if ($data['success']) {
            $data['message'] = "Persona eliminado correctamente";
            $data = $this->model->displayPeoples();
        } else {
            $data['message'] = "La persona no se elimino correctamente";
        }
        $data['displayAllPeoples'] = true;
        $this->view("PeopleView", $data);
    }
    public function editPeople($id_people)
    {
        isLogged();
        $data = array();
        $params = array(
            'id_people' => intval(filter_var($id_people, FILTER_SANITIZE_NUMBER_INT))
        );
        $data = $this->model->getInfoPeople($params);
        $data['editPeople'] = true;
        if (isModeDebug()) {
            writeLog(INFO_LOG, "PeopleController/editPeople", json_encode($data));
        }
        $this->view("PeopleView", $data);
    }
    public function edit()
    {
        isLogged();
        if (isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST") {
            $data = array();
            $params = array(
                'nombre' => $_POST['nombre'],
                'paterno' => $_POST['paterno'],
                'materno' => $_POST['materno'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'edad' => $_POST['edad'],
                'sexo' => $_POST['sexo'],
                'id_people' => filter_var($_POST['id_people'], FILTER_SANITIZE_NUMBER_INT)
            );

            $errors = $this->model->checkErrors($params);

            if (count($errors) === 0) {

                $params = array(
                    'nombre' => $_POST['nombre'],
                    'paterno' => $_POST['paterno'],
                    'materno' => $_POST['materno'],
                    'direccion' => $_POST['direccion'],
                    'telefono' => $_POST['telefono'],
                    'edad' => $_POST['edad'],
                    'sexo' => $_POST['sexo'],
                    'id_people' => $_POST['id_people'],
                );

                $data = $this->model->edit($params);
                if ($data['success']) {
                    $data = $this->model->displayPeoples();
                    $data['message'] = "Registro editado correctamente";
                } else {
                    $data['message'] = "El registro no se actualizo";
                }
            } else {
                $data['info_vehicle'] = array(
                    'nombre' => $_POST['nombre'],
                    'paterno' => $_POST['paterno'],
                    'materno' => $_POST['materno'],
                    'direccion' => $_POST['direccion'],
                    'telefono' => $_POST['telefono'],
                    'edad' => $_POST['edad'],
                    'sexo' => $_POST['sexo'],
                    'id' => filter_var($_POST['id_vehicle'], FILTER_SANITIZE_NUMBER_INT),
                );

                $data['show_message_info'] = true;
                $data['success'] = false;
                $data['message'] = $errors;
                $data['editVehicle'] = true;
            }
            if (isModeDebug()) {
                writeLog(INFO_LOG, "PeopleController/edit", json_encode($data));
            }
            $data['displayAllPeoples'] = true;
            $this->view("PeopleView", $data);
        }
    }
}