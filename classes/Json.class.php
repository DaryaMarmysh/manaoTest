<?php
session_start();
class Json
{
    private $jsonFile = "./json_files/database.JSON";

    public function getUsers()
    {
        if (file_exists($this->jsonFile)) {
            $json = file_get_contents($this->jsonFile);
            $data = json_decode($json, true);
            return !empty($data) ? $data : false;
        }
        return false;
    }
    public function checkUnique($fieldName,$value)
    {
        $json = file_get_contents($this->jsonFile);
        $data = json_decode($json, true);
        if (!empty($data)) {
            return array_search($value, array_column($data, $fieldName));
        }
        return false;
    }

    public function addUser($data)
    {
        $users = $this->getUsers();
        $users[] = $data;
        file_put_contents($this->jsonFile, json_encode($users, JSON_FORCE_OBJECT));
    }
}
