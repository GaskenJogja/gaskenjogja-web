<?php

require_once './vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class User {
    protected $database;
    

    public function __construct(){
        $acc = ServiceAccount::fromJsonFile(__DIR__.'/secret/gaskenjogja-9879d41e0f3f.json');
        $firebase = (new Factory)->withServiceAccount($acc)->create();

        $this->database = $firebase->getDatabase();
    }

    public function get(int $userId, $dbname){
        if(empty($userId) || !isset($userId)){ return false;}

        if($this->database->getReference($dbname)->getSnapshot()->hasChild($userId)){
            return $this->database->getReference($dbname)->getChild($userId)->getValue();
        }
        else{
            return false;
        }
    }

    public function insert(array $data, $dbname){
        if(empty($data) || !isset($data)){ return false;}

        foreach ($data as $key => $val){
            $this->database->getReference($dbname)->getChild($key)->set($val);
        }

        return true;
    }

    public function delete(int $userId, $dbname){
        if(empty($userId) || !isset($userId)){ return false;}

        if($this->database->getReference($dbname)->getSnapshot()->hasChild($userId)){
            $this->database->getReference($dbname)->getChild($userId)->remove();

            return true;
        }
        else{
            return false;
        }

    }
}
