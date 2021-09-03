<?php
namespace App\Hive\Web\Executor;

use App\Hive\Web\Base;
use App\Hive\Data\CustomerData;

class CustomerExe extends Base{
    private $cust_data;
    protected $data = array();

    public function __construct(){
        $this->cust_data = new CustomerData();
    }
}
?>