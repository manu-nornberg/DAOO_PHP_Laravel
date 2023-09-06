<?php

namespace Emanu\Aula3Composer\controller\api;

abstract class Controller
{
    protected function setHeader(int $statusCode = 0,string $message = ''){
        if(!$statusCode)
            header("Content-Type:application/json;charset=utf-8'");
        else header("HTTP/1.0 $statusCode $message");
    }

    protected function validatePostRequest(array $fields):bool{
        foreach($fields as $field)
            if(!isset($_POST[$field])){
                $this->setHeader(400,'Bad Request');
                return false;
            }
        return true;
    }
}