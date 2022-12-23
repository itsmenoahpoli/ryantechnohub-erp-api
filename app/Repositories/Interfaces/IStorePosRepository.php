<?php

namespace App\Repositories\Interfaces;

interface IStorePosRepository
{
    public function getAllPOS($params);
    public function createPos($data);
}