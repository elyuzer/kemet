<?php
namespace App\Hive\Web\Executor;

use App\Hive\Web\Base;
use App\Hive\Data\AccountData;

class AccountExe extends Base{
    private $acc_data;
    protected $data = array();

    public function __construct(){
        $this->acc_data = new AccountData();
    }
}
?>