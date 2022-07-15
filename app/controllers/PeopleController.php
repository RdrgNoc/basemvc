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
}