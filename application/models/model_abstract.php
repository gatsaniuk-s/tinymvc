<?php
abstract class Model_Abstract
{
    protected $db = null;

    public function __construct() {
        if (null === $this->db)
        {
            $this->db = new PDO('mysql:host=localhost;dbname=tinymvc', 'root', 'root');
        }
    }
}
