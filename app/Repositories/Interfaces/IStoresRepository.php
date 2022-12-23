<?php

namespace App\Repositories\Interfaces;

interface IStoresRepository
{
    public function getStores($params);
    public function getStore($storeId);
    public function createStore($data);
    public function updateStore($storeId, $data);
    public function deleteStore($storeId);
}