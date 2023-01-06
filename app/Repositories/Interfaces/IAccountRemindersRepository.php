<?php

namespace App\Repositories\Interfaces;

interface IAccountRemindersRepository
{
    public function getAccountReminders($params);
    public function createAccountReminder($data);
    public function updateAccountReminder($accountReminderId, $data);
    public function deleteAccountReminder($accountReminderId);
}