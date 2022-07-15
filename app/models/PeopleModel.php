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
                writeLog(INFO_LOG, "People/displayPeoples", $sql);
                writeLog(INFO_LOG, "People/displayPeoples", json_encode($paramsDB));
            }

            $data['peoples'] = $db->getDataPrepared($sql, $paramsDB);

        } catch (Exception $e) {
            $data['show_message_info'] = true;
            $data['success'] = false;
            $data['message'] = ERROR_GENERAL;
            writeLog(ERROR_LOG, "People/displayPeoples", $e->getMessage());
        }
        $db->close();

        return $data;
    }
}