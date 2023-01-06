<?php

namespace App\Repositories\Accountings;

use App\Repositories\Interfaces\IAccountRemindersRepository;
use App\Models\Accountings\AccountReminder;

class AccountRemindersRepository implements IAccountRemindersRepository
{
    public function getAccountReminders($params)
    {
        $accountReminder = AccountReminder::query();

        if ($params['type'] !== 'all')
        {
            $accountReminder->where(
                'type',
                $params['type']
            );
        }
        
        return $accountReminder
                ->orderBy('id', 'DESC')
                ->get();
    }

    public function createAccountReminder($data)
    {
        $data['reminder_type'] = implode(', ', $data['reminder_type']);
        $accountReminder = AccountReminder::create($data);

        return $accountReminder;
    }

    public function getAccountReminder($reminderId)
    {
        $accountReminder = AccountReminder::findOrFail($reminderId);
        
        return $accountReminder;
    }

    public function updateAccountReminder($accountReminderId, $data)
    {
        $accountReminder = $this->getAccountReminder($accountReminderId);
        $accountReminder->update($data);

        return $accountReminder;
    }

    public function deleteAccountReminder($accountReminderId)
    {
        $accountReminder = $this->getAccountReminder($accountReminderId);
        $accountReminder->forceDelete();

        return null;
    }
}