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
}