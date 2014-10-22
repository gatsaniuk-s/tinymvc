<?php
class Routing
{
    private $default_controller = 'main';
    private $default_action = 'index';

    private $controller_prefix = 'controller_';
    private $action_prefix = 'action_';
    private $model_prefix = 'model_';

    function __construct ()
    {
//        echo'<pre>';
//         print_r($_SERVER['REQUEST_URI']);
//        echo'</pre>';
//        echo "route: ".$_SERVER['REQUEST_URI']."<br>";
        $this->routes = explode('/', $_SERVER['REQUEST_URI']);
//        echo'<pre>';
//        print_r($this->routes);
//        echo'</pre>';
//        exit;
        if (count($this->routes)>3) die('Непредусмотренный маршрут!');

        // получаем имя контроллера
        if ( !empty($this->routes[1]) )
        {
            $this->controller_name = $this->routes[1];
        }
        else
        {
            $this->controller_name = $this->default_controller;
        }
//        echo'<pre>';
//        print_r($this->controller_name);
//        echo'</pre>';

        // получаем имя экшена
        if ( !empty($this->routes[2]) )
        {
            $this->action_name = $this->routes[2];	// vj;tv
        }
        else
        {
            $this->action_name = $this->default_action;
        }

        // добавляем префиксы
        $this->model_name = $this->model_prefix . $this->controller_name;
        $this->controller_name = $this->controller_prefix . $this->controller_name;
        $this->action_name = $this->action_prefix.$this->action_name;
        $this->run();
    }
    function run()
    {
//        echo (555);
        // подцепляем файл с классом модели
//        $model_file = strtolower($this->model_name).'.php';
//        $model_path = "application/models/".$model_file;
//        if(file_exists($model_path)) include "models/".$model_file;
        // файла модели может и не быть

        // подцепляем файл с классом контроллера
//        $controller_file = strtolower($this->controller_name).'.php';
//        $controller_path = "application/controllers/".$controller_file;
//        echo($controller_path);
//        exit;
//        if(file_exists($controller_path)) include "controllers/".$controller_file;
//        else die('Такого контроллера не существует!'); // здесь можно кинуть исключение

//        echo($this->controller_name).'<br>';
//        echo($this->action_name);
//        exit;
        // создаем контроллер и вызываем экшн
        $controller = new $this->controller_name;
//        echo(111);
//        exit;
        $action = $this->action_name;
//        echo($controller).'<br>';
//        echo($action);
//        exit;
        if(method_exists($controller, $action))
            $controller->$action();
        else die('Такого экшена не существует!'); // здесь можно кинуть исключение
    }
}
