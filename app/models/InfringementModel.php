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
            $sql = "SELECT * FROM infringement a INNER JOIN people b ON a.people = b.id INNER JOIN vehicles c ON a.vehicle = c.id INNER JOIN conditions d ON a.conditions = d.id";

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
            array_push($errors, "VACIO");
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
}