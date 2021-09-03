<?php 
namespace App\Web\Extension;

use App\Hive\Web\Base;
use App\Hive\Data\ItemData;

class ItemExt extends Base{
    private $item_data;

    public function __construct()
    {
        $this->item_data = new ItemData();
    }
}

?>
