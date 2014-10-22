<?php
set_include_path(get_include_path(). PATH_SEPARATOR .'application/');
set_include_path(get_include_path(). PATH_SEPARATOR .'application/models/');
set_include_path(get_include_path(). PATH_SEPARATOR .'application/controllers/');
set_include_path(get_include_path(). PATH_SEPARATOR .'application/views/');

//echo(get_include_path());
//exit;
spl_autoload_extensions(".php");
spl_autoload_register();
//require 'models/model_abstract.php';
//require 'routing.php';
//require 'controllers/controller_contacts.php';
//new Controller_Contacts();
new Routing();
