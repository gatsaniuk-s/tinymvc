<?php
class Controller_Main {

    public $load;
    public $model;

    function __construct()
    {
        $this->load = new Load();
    }

    function action_index()
    {
        $this->load->view('main_view.php', 'template_view.php');
    }
}
