<?php

class CRUD
{
    private $db = 'src/db/db.json';

    public function create($parameters){
        $fileDataJSON = file_get_contents($this->db);

        $fileData = json_decode($fileDataJSON, true);
        $newUser =  $parameters;

        if ($fileData !== null){
            $fileData[] = $newUser;
        }
        elseif ($fileData === null){
            $fileData = [1 => $newUser];
        }
        file_put_contents($this->db, json_encode($fileData));

        unset($fileData);

        return true;
    }

    public function read(){
        $json = file_get_contents($this->db);
        $data = json_decode($json, true);

        return $data;
    }

    public function update(){
        return ;
    }

    public function delete(){
        return ;
    }
}