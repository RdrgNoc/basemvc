<?php

class PeopleModel
{

    public function __construct()
    {
    }

    public function displayPeoples(){
        $db = new PDODB();
        $data = array();
        $paramsDB = array();
        try {
            $sql = "SELECT * FROM people";

            $data['num_elems'] = $db->numRowsPrepared($sql, $paramsDB);
            if (isModeDebug()) {
                writeLog(INFO_LOG, "PeopleModel/displayPeoples", $sql);
                writeLog(INFO_LOG, "PeopleModel/displayPeoples", json_encode($paramsDB));
            }
            $data['peoples'] = $db->getDataPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['show_message_info'] = true;
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "PeopleModel/displayPeoples", $e->getMessage());
        }
        $db->close();
        return $data;
    }
    function checkErrors($params)
    {
        $errors = array();
        if (empty($params['nombre'])) {
            array_push($errors, "El campo nombre no puede estar vacio.");
        }
        if (empty($params['paterno'])) {
            array_push($errors, "El apellido paterno no puede estar vacio.");
        }
        if (empty($params['materno'])) {
            array_push($errors, "El apellido materno no puede estar vacio.");
        }
        if (empty($params['direccion'])) {
            array_push($errors, "La dirección no puede estar vacio.");
        }
        if (empty($params['telefono'])) {
            array_push($errors, "El telefono no puede estar vacio.");
        }
        if (empty($params['edad'])) {
            array_push($errors, "La edad no puede estar vacio.");
        }
        if (empty($params['sexo'])) {
            array_push($errors, "El campo sexo no puede estar vacio.");
        }
        return $errors;
    }
    public function registry($params)
    {
        $db = new PDODB();
        $data = array();
        $data['show_message_info'] = true;
        $paramsDB = array();
        try {
            $id_people = $db->getLastId("id", "people");
            $sql = "INSERT INTO people VALUES(?,?,?,?,?,?,?,?)";

            $paramsDB = array(
                $id_people,
                $params['nombre'],
                $params['paterno'],
                $params['materno'],
                $params['edad'],
                $params['telefono'],
                $params['direccion'],
                $params['sexo'],
            );

            if (isModeDebug()) {
                writeLog(INFO_LOG, "PeopleModel/registry", $sql);
                writeLog(INFO_LOG, "PeopleModel/registry", json_encode($paramsDB));
            }

            $success = $db->executeInstructionPrepared($sql, $paramsDB);
            $data['success'] = $success;
            if ($success) {
                $data['message'] = "Se registro la persona";
                $sql2 = "SELECT * FROM people WHERE id = ?";
                $paramsDB2 = array(
                    $id_people
                );
                $data['infoReturnPeople'] = $db->getDataSinglePrepared($sql2, $paramsDB2);
            } else {
                $data['message'] = "Su registro no se ha realizado con éxito.";
            }
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "PeopleModel/registry", $e->getMessage());
        }

        $db->close();
        return $data;
    }
    public function delete($params)
    {
        $db = new PDODB();
        $data = array();
        $data['show_message_info'] = true;
        $paramsDB = array();
        try {
            $sql = "DELETE FROM people WHERE id = ?";
            $paramsDB = array(
                $params['id_people']
            );
            if (isModeDebug()) {
                writeLog(INFO_LOG, "PeopleModel/delete", $sql);
                writeLog(INFO_LOG, "PeopleModel/delete", json_encode($paramsDB));
            }
            $data['success'] = $db->executeInstructionPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "PeopleModel/delete", $e->getMessage());
        }
        $db->close();
        return $data;
    }
    public function getInfoPeople($params)
    {
        $db = new PDODB();
        $data = array();
        $paramsDB = array();
        try {
            $sql = "SELECT * FROM people WHERE id = ?";
            $paramsDB = array(
                $params['id_people']
            );
            if (isModeDebug()) {
                writeLog(INFO_LOG, "PeopleModel/getInfoPeople", $sql);
                writeLog(INFO_LOG, "PeopleModel/getInfoPeople", json_encode($paramsDB));
            }
            $data['info_people'] = $db->getDataSinglePrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "PeopleModel/getInfoPeople", $e->getMessage());
        }

        $db->close();
        return $data;
    }
    public function edit($params)
    {
        $db = new PDODB();
        $data = array();
        $data['show_message_info'] = true;
        $paramsDB = array();
        try {
            $sql = "UPDATE people SET nombre = ?, paterno = ?, materno = ?, edad = ?, telefono = ?, direccion = ?, sexo = ? WHERE id = ?";
            $paramsDB = array(
                $params['nombre'],
                $params['paterno'],
                $params['materno'],
                $params['edad'],
                $params['telefono'],
                $params['direccion'],
                $params['sexo'],
                $params['id_people']
            );
            if (isModeDebug()) {
                writeLog(INFO_LOG, "PeopleModel/edit", $sql);
                writeLog(INFO_LOG, "PeopleModel/edit", json_encode($paramsDB));
            }
            $data['success'] = $db->executeInstructionPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "PeopleModel/edit", $e->getMessage());
        }
        $db->close();
        return $data;
    }
}