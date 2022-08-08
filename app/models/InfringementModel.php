<?php

class InfringementModel
{

    public function __construct()
    {
    }

    function displayInfringement()
    {
        $db = new PDODB();
        $data = array();
        $paramsDB = array();

        try {
            $sql = "SELECT 
	                    a.id as idInfringement, 
	                            a.motivo as motivo, 
	                            a.multa as multa,
                                a.date as fecha, 
                                concat(b.nombre, b.paterno, b.materno) as nomCompleto, 
                                concat(c.marca, c.modelo) as vehiculo, 
                                c.matricula as matricula, 
                                d.conditions as conditions 
                    FROM infringement a INNER JOIN people b ON a.people = b.id INNER JOIN vehicles c ON a.vehicle = c.id INNER JOIN conditions d ON a.conditions = d.id";

            $data['num_elems'] = $db->numRowsPrepared($sql, $paramsDB);

            if (isModeDebug()) {
                writeLog(INFO_LOG, "Infringement/displayInfringement", $sql);
                writeLog(INFO_LOG, "Infringement/displayInfringement", json_encode($paramsDB));
            }

            $data['infringements'] = $db->getDataPrepared($sql, $paramsDB);

        } catch (Exception $e) {
            $data['show_message_info'] = true;
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "Infringement/displayInfringement", $e->getMessage());
        }
        $db->close();

        return $data;
    }

    function checkErrors($params)
    {
        $errors = array();

        if (!empty($params['opcion'])) {
            if ($params['opcion'] === "1") {
                if (empty($params['motivo'])) {
                    array_push($errors, "El campo motivo no puede estar vacio.");
                }
                if (empty($params['multa'])) {
                    array_push($errors, "El campo multa no puede estar vacio.");
                }
            }
            if ($params['opcion'] === "2") {
                if (empty($params['motivo'])) {
                    array_push($errors, "El campo motivo no puede estar vacio.");
                }
                if (empty($params['multa'])) {
                    array_push($errors, "El campo multa no puede estar vacio.");
                }
                if (empty($params['people'])) {
                    array_push($errors, "El campo persona no puede estar vacio.");
                }
                if (empty($params['vehicle'])) {
                    array_push($errors, "El campo vehiculo no puede estar vacio.");
                }
                if (empty($params['conditions'])) {
                    array_push($errors, "El campo estado no puede estar vacio.");
                }
            }
        } else {
            if (empty($params['motivo'])) {
                array_push($errors, "El campo motivo no puede estar vacio.");
            }
            if (empty($params['multa'])) {
                array_push($errors, "El campo multa no puede estar vacio.");
            }
            if (empty($params['conditions'])) {
                array_push($errors, "El campo estado no puede estar vacio.");
            }
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
            $id_infringement = $db->getLastId("id", "infringement");
            $sql = "INSERT INTO infringement VALUES(?,?,?,?,?,?,?)";

            $paramsDB = array(
                $id_infringement,
                $params['motivo'],
                $params['multa'],
                $params['date'],
                $params['people'],
                $params['vehicle'],
                $params['conditions'],
            );

            if (isModeDebug()) {
                writeLog(INFO_LOG, "InfringementModel/registry", $sql);
                writeLog(INFO_LOG, "InfringementModel/registry", json_encode($paramsDB));
            }

            $success = $db->executeInstructionPrepared($sql, $paramsDB);

            $data['success'] = $success;
            if ($success) {
                $data['message'] = "Se registro la infracción";
            } else {
                $data['message'] = "Su registro no se ha realizado con éxito.";
            }
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "InfringementModel/registry", $e->getMessage());
        }

        $db->close();
        return $data;
    }
    public function getAllVehiclesInput()
    {
        $db = new PDODB();
        $data = array();
        $paramsDB = array();
        try {
            $sql = "SELECT * FROM vehicles";
            if (isModeDebug()) {
                writeLog(INFO_LOG, "InfringementModel/getAllVehiclesInput", $sql);
                writeLog(INFO_LOG, "InfringementModel/getAllVehiclesInput", json_encode($paramsDB));
            }
            $data = $db->getDataPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['show_message_info'] = true;
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "InfringementModel/getAllVehiclesInput", $e->getMessage());
        }
        $db->close();
        return $data;
    }
    public function getAllPeoplesInput()
    {
        $db = new PDODB();
        $data = array();
        $paramsDB = array();
        try {
            $sql = "SELECT * FROM people";
            if (isModeDebug()) {
                writeLog(INFO_LOG, "InfringementModel/getAllPeoplesInput", $sql);
                writeLog(INFO_LOG, "InfringementModel/getAllPeoplesInput", json_encode($paramsDB));
            }
            $data = $db->getDataPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['show_message_info'] = true;
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "InfringementModel/getAllPeoplesInput", $e->getMessage());
        }
        $db->close();
        return $data;
    }
    public function getAllConditionsInput()
    {
        $db = new PDODB();
        $data = array();
        $paramsDB = array();
        try {
            $sql = "SELECT * FROM conditions";
            if (isModeDebug()) {
                writeLog(INFO_LOG, "InfringementModel/getAllConditionsInput", $sql);
                writeLog(INFO_LOG, "InfringementModel/getAllConditionsInput", json_encode($paramsDB));
            }
            $data = $db->getDataPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['show_message_info'] = true;
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "InfringementModel/getAllConditionsInput", $e->getMessage());
        }
        $db->close();
        return $data;
    }
    public function getInfoInfringement($params)
    {
        $db = new PDODB();
        $data = array();
        $paramsDB = array();
        try {
            $sql = "SELECT * FROM infringement WHERE id = ?";

            $paramsDB = array(
                $params['id_infringement']
            );

            if (isModeDebug()) {
                writeLog(INFO_LOG, "InfringementModel/getInfoInfringement", $sql);
                writeLog(INFO_LOG, "InfringementModel/getInfoInfringement", json_encode($paramsDB));
            }

            $data = $db->getDataSinglePrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "InfringementModel/getInfoInfringement", $e->getMessage());
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
            $sql = "UPDATE infringement SET motivo = ?, multa = ?, date = ?, conditions = ? WHERE id = ?";
            $paramsDB = array(
                $params['motivo'],
                $params['multa'],
                $params['date'],
                $params['conditions'],
                $params['id_infringement']
            );

            if (isModeDebug()) {
                writeLog(INFO_LOG, "InfringementModel/edit", $sql);
                writeLog(INFO_LOG, "InfringementModel/edit", json_encode($paramsDB));
            }

            $data['success'] = $db->executeInstructionPrepared($sql, $paramsDB);
        } catch (Exception $e) {
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "InfringementModel/edit", $e->getMessage());
        }
        $db->close();
        return $data;
    }
}