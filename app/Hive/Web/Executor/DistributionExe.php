<?php
namespace App\Hive\Web\Executor;

use App\Hive\Web\Base;
use App\Hive\Data\DistributionData;

class DistributionExe extends Base{
    private $dist_data;
    protected $data = array();

    public function __construct()
    {
        $this->dist_data = new DistributionData();
    }
}
?>