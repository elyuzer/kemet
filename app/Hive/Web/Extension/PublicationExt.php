<?php 
namespace App\Hive\Web\Extension;

use App\Hive\Web\Base;
use App\Hive\Data\PublicationData;

class PublicationExt extends Base{
    private $pub_data;

    public function __construct()
    {
        $this->pub_data = new PublicationData();
    }
}
?>
