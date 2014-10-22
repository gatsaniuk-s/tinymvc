<?php
class Controller_Admin {
    public $load;
    public $model;
    function __construct()
    {
        $this->load = new Load();
    }

    function action_index()
    {
        $data = array();
        session_start();

        if ( isset($_SESSION['email']) )
        {
            $this->load->view('admin_view.php', 'template_view.php', $data);
        }
        else
        {
            session_destroy();
            header('Location:http://tinymvc.my/404/');
        }
    }

    function action_logout()
    {
        session_start();
        unset($_SESSION['email']);
        session_destroy();
        header('Location:http://tinymvc.my/');
    }
}
