<?php
namespace App\Hive\Web\Executor;

use App\Hive\Web\Base;
use App\Hive\Data\ItemData;

class ItemExe extends Base{
    private $item_data;
    protected $data = array();

    public function __construct()
    {
        $this->item_data = new ItemData();
    }
}
?>