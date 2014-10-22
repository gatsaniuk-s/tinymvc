<?php
class Controller_404 {

    public $load;
    public $model;

    function __construct()
    {
        $this->load = new Load();
    }

    function action_index()
    {
        $this->load->view('404_view.php', 'template_view.php');
    }
}
