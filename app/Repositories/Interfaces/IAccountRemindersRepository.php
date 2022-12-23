<?php

namespace App\Repositories\Interfaces;

interface IAccountRemindersRepository
{
    public function getAccountReminders($params);
    public function createAccountReminders($data);
    public function updateAccountReminders($accountReminderId, $data);
    public function deleteAccountReminders($accountReminderId);
}