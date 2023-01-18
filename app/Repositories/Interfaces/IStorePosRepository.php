<?php

namespace App\Repositories\Interfaces;

interface IStorePosRepository
{
    public function getAllPOS($params);
    public function getPos($posId);
    public function createPos($data);
    public function updatePos($posId, $data);
    public function deletePos($posId);
}
