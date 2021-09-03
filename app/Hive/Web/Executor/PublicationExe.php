<?php
namespace App\Hive\Web\Executor;

use App\Hive\Web\Base;
use APp\Hive\Data\PublicationData;

class PublicationExe extends Base{
    private $pub_data;
    protected $data = array();

    public function __construct(){
        $this->pub_data = new PublicationData();
    }
}
?>