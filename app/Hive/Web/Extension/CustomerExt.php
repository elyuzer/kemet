<?php 
namespace App\Web\Extension;

use App\Hive\Web\Base;
use App\Hive\Data\CustomerData;

class CustomerExt extends Base{
    private $cust_data;

    public function __construct(){
        $this->cust_data = new CustomerData();
    }
}

?>
