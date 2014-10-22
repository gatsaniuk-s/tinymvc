<?php

class Controller_Contacts {

    public $load;
    public $model;

    function __construct()
    {
//        echo(555);
        $this->load = new Load();
//        echo(333);
    }

    function action_index()
    {
        $model = new Model_User();
        $users = $model->findAll();
//        var_dump($users);
        $this->load->view('contacts_view.php', 'template_view.php', $users);
    }
}
