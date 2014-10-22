<?php

class Model_User extends Model_Abstract {
    public function __construct() {
        parent::__construct();
    }

    public function findAll() {
        $stmt = $this->db->query('SELECT * from users');
        $stmt->setFetchMode(PDO::FETCH_OBJ);

        $result = array();
        while($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;
    }


    public  function  login($email, $pass) {
//        echo("SELECT email, password from users WHERE email = '$email' and password = '$pass'");
        $stmt = $this->db->query("SELECT email, password from users WHERE email = '$email' and password = '$pass'");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $stmt->fetch())
        {
            $result[] = $row;
        }

        return $result;
    }

    public  function addUser($email, $pass) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result['email'] = 'access_granted';
        }
        else {
            $result['email'] = 'access_denied';
        }

        if(strlen(trim($pass)) >= 4) {
            $result['pass'] = 'access_granted';
        }
        else {
            $result['pass'] = 'access_denied';
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) and (strlen($pass) >= 4) ) {
            $sql = "INSERT INTO users (email,password) VALUES (:email,:pass)";
            $q = $this->db->prepare($sql);
            $q->execute(array(':email'=>$email,':pass'=>$pass));

            return $result;
        }
        else {
            return $result;
        }
    }

}

//$Object2 = new Model_User();
//var_dump(); // object(Foo)[1]
//var_dump($Object2); // object(Bar)[2]
//$Object2->findAll();
//
//
//
//
//$stmt = $Object2->query('SELECT * from users');
//$stmt->setFetchMode(PDO::FETCH_ASSOC);
//while($row = $stmt->fetch())
//{
//    echo "<b> id:&nbsp&nbsp</b>". $row['id'] ."<br />"  ;
//    echo "<b>email:&nbsp&nbsp</b>". $row['email'] . '<br />' ;
//    echo "<b>password:&nbsp&nbsp</b   >" . $row['password'] . "<hr><br />";
//}
