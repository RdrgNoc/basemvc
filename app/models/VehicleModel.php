<?php

class VehicleModel
{

    public function __construct()
    {
    }

    public function displayVehicles(){
        $db = new PDODB();
        $data = array();
        $paramsDB = array();

        try {
            $sql = "SELECT * FROM vehicles";

            $data['num_elems'] = $db->numRowsPrepared($sql, $paramsDB);


            if (isModeDebug()) {
                writeLog(INFO_LOG, "Vehicle/displayVehicles", $sql);
                writeLog(INFO_LOG, "Vehicle/displayVehicles", json_encode($paramsDB));
            }

            $data['vehicles'] = $db->getDataPrepared($sql, $paramsDB);

        } catch (Exception $e) {
            $data['show_message_info'] = true;
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "Vehicle/displayVehicles", $e->getMessage());
        }
        $db->close();

        return $data;
    }
    function checkErrors($params)
    {
        $errors = array();
        if (empty($params['modelo'])) {
            array_push($errors, "El modelo no puede estar vacio.");
        }
        if (empty($params['marca'])) {
            array_push($errors, "La marca no puede estar vacio.");
        }
        if (empty($params['descripcion'])) {
            array_push($errors, "La descripcion no puede estar vacio.");
        }
        if (empty($params['no_circulacion'])) {
            array_push($errors, "El no. circulación no puede estar vacio.");
        }
        if (empty($params['no_licencia'])) {
            array_push($errors, "El no. licencia no puede estar vacio.");
        }
        if (empty($params['matricula'])) {
            array_push($errors, "La matricula no puede estar vacio.");
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
            $id_vehicle = $db->getLastId("id", "vehicles");
            $sql = "INSERT INTO vehicles VALUES(?,?,?,?,?,?,?)";

            $paramsDB = array(
                $id_vehicle,
                $params['modelo'],
                $params['marca'],
                $params['descripcion'],
                $params['no_circulacion'],
                $params['no_licencia'],
                $params['matricula'],
            );

            if (isModeDebug()) {
                writeLog(INFO_LOG, "Vehicle/registry", $sql);
                writeLog(INFO_LOG, "Vehicle/registry", json_encode($paramsDB));
            }

            $success = $db->executeInstructionPrepared($sql, $paramsDB);
            $data['success'] = $success;
            $data['text-center'] = true;

            if ($success) {
                $data['message'] = "Se registro el vehiculo";
                $sql2 = "SELECT * FROM vehicles WHERE id = ?";
                $paramsDB2 = array(
                    $id_vehicle
                );
                $data['infoReturnVehicle'] = $db->getDataSinglePrepared($sql2, $paramsDB2);
            } else {
                $data['message'] = "Su registro no se ha realizado con éxito.";
            }
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "Vehicle/registry", $e->getMessage());
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
            $sql = "DELETE FROM vehicles WHERE id = ?";

            $paramsDB = array(
                $params['id_vehicle']
            );

            if (isModeDebug()) {
                writeLog(INFO_LOG, "VehicleModel/delete", $sql);
                writeLog(INFO_LOG, "VehicleModel/delete", json_encode($paramsDB));
            }

            $data['success'] = $db->executeInstructionPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "VehicleModel/delete", $e->getMessage());
        }

        $db->close();
        return $data;
    }

    public function getInfoVehicle($params)
    {
        $db = new PDODB();
        $data = array();
        $paramsDB = array();
        try {
            $sql = "SELECT * FROM vehicles WHERE id = ?";

            $paramsDB = array(
                $params['id_vehicle']
            );

            if (isModeDebug()) {
                writeLog(INFO_LOG, "VehicleModel/getInfoVehicle", $sql);
                writeLog(INFO_LOG, "VehicleModel/getInfoVehicle", json_encode($paramsDB));
            }

            $data['info_vehicle'] = $db->getDataSinglePrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "VehicleModel/getInfoVehicle", $e->getMessage());
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
            $sql = "UPDATE vehicles SET modelo = ?, marca = ?, descripcion = ?, no_circulacion = ?, no_licencia = ?, matricula = ? WHERE id = ?";
            $paramsDB = array(
                $params['modelo'],
                $params['marca'],
                $params['descripcion'],
                $params['no_circulacion'],
                $params['no_licencia'],
                $params['matricula'],
                $params['id_vehicle']
            );

            if (isModeDebug()) {
                writeLog(INFO_LOG, "VehicleModel/edit", $sql);
                writeLog(INFO_LOG, "VehicleModel/edit", json_encode($paramsDB));
            }

            $data['success'] = $db->executeInstructionPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "VehicleModel/edit", $e->getMessage());
        }
        $db->close();
        return $data;
    }
}