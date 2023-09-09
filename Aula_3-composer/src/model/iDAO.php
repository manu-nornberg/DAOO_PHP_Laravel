<?php

namespace Emanu\Aula3Composer\model;

interface iDAO
{
    public function create();
    public function read($id = null);
    public function update();
    public function delete($id);


    public function getColumns():array;
}