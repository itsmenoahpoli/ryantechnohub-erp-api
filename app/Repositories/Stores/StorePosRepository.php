<?php

namespace App\Repositories\Stores;

use App\Repositories\Interfaces\IStorePosRepository;
use App\Models\Stores\StorePos as POS;

use Str;
use Hash;

class StorePosRepository implements IStorePosRepository
{
    public function authenticate($credentials)
    {
        $pos = POS::with('store')->where('username', $credentials->username)->firstOrFail();

        if (Hash::check($credentials->password, $pos->password))
        {
            return (object) [
                'authenticated' => true,
                'pos' => $pos
            ];
        }

        return (object) [
            'authenticated' => false,
            'pos' => NULL
        ];
    }

    public function getAllPOS($params)
    {
        return POS::all();
    }

    public function createPos($data)
    {
        $data['store_pos_no'] = 'POS-'.strtoupper(Str::random(10));
        $data['password'] = bcrypt($data['password']);
        $pos = POS::create($data);

        return $pos;
    }
    
}