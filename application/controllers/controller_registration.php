<?php
class Controller_Registration {

    public $load;
    public $model;

    function __construct()
    {
        $this->load = new Load();
    }

    function action_index()
    {
        $this->load->view('registration_view.php', 'template_view.php');
    }

    function action_adduser() {
        $email = ($_POST[email]);
        $pass = ($_POST[password]);

        $model = new Model_User();
        $status = $model->addUser($email,$pass);
//        print_r($status);
//        exit;

        if (($status['email'] == 'access_granted') and ($status['pass'] == 'access_granted'))  {
            header('Location:http://tinymvc.my/');
        }

        $this->load->view('registration_view.php', 'template_view.php', $status);
    }
}
