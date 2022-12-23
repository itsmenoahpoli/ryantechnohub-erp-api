<?php

namespace App\Repositories\Accountings;

use App\Repositories\Interfaces\IAccountRemindersRepository;
use App\Models\Accountings\AccountReminder;

class AccountRemindersRepository implements IAccountRemindersRepository
{
    public function getAccountReminders($params)
    {
        return AccountReminder::where(
            'type',
            $params['type']
        )
        ->orderBy('id', 'DESC')
        ->get();
    }
    public function createAccountReminders($data)
    {
        
    }
    public function updateAccountReminders($accountReminderId, $data)
    {
        
    }
    public function deleteAccountReminders($accountReminderId)
    {
        
    }
}