<?php
namespace App\Usercontrol;

class Usercontrol{

    public function checkInput($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}