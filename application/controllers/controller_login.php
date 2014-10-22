<?php
class Controller_Login {
    public $load;
    public $model;

    function __construct()
    {
        $this->load = new Load();
    }

    function action_index()
    {
        //$data["login_status"] = "";
//        if(isset($_POST['login']) && isset($_POST['password']))
//        {
//            $login = $_POST['login'];
//            $password =$_POST['password'];
//
//            if($login=="admin" && $password=="12345")
//            {
//                $data["login_status"] = "access_granted";
//
//                session_start(); echo $_SESSION['admin'];
//                $_SESSION['admin'] = $password;
//                header('Location:http://tinymvc.my/admin/');
//            }
//            else
//            {
//                $data["login_status"] = "access_denied";
//            }
//        }
//        else
//        {
//            $data["login_status"] = "";
//        }

        $this->load->view('login_view.php', 'template_view.php', $data);
    }

    function action_login() {
        $email = $_POST['email'];
        $pass =  $_POST['password'];

        $model = new Model_User();
        $user = $model->login($email,$pass);

        if ($user) {
            $data["login_status"] = "access_granted";
                session_start();
                echo $_SESSION["'$email'"];
                $_SESSION["email"] = $email;
                header('Location:http://tinymvc.my/admin/');
        }
        else {
            $data["login_status"] = "access_denied";
        }

        $this->load->view('login_view.php', 'template_view.php', $data);
    }
}
