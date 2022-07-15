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
            writeLog(ERROR_LOG, "Infringement/displayInfringement", $e->getMessage());
        }
        $db->close();

        return $data;
    }
}