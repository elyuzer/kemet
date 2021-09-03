<?php
namespace App\Hive\Data;

class AccountData{
    public $admin = ['name' => 'Administer application'];
    public $manipulate_account = ['name' => 'Create, view, edit, delete user account, organisation and group'];
    public $manipulate_role = ['name' => 'Create, view, edit, delete role'];
    public $assign_role_permission = ['name' => 'Assign permission to a role'];
    public $assign_user_role = ['name' => 'Assign a role to a user'];
    public $assign_account_organisation = ['name' => 'Assign a account to a organisation'];
    public $assign_account_group = ['name' => 'Assign a account to a group'];
    public $manipulate_contact = ['name' => 'Create, view, edit, delete phone number, email address and postal address'];

}
?>