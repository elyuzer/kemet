<?php 
namespace App\Web\Extension;

use App\Hive\Web\Base;
use App\Hive\Data\DistributionData;

class DistributionExt extends Base{
    private $pub_data;
    protected $data = array();

    public function __construct(){
        $this->pub_data = new DistributionData();
    }
}

?>
