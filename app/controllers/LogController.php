<?php

class LogController extends Controller
{

    private $model;

    function __construct()
    {
        $this->model = $this->model("LogModel");
    }

    function display()
    {
        isLogged();

        $data = $this->model->get_lines_log();

        $this->view("LogView", $data);
    }

    function delete_content_log()
    {

        isLogged();

        $data = $this->model->delete_content_log();

        $this->view("LogView", $data);
    }
}
