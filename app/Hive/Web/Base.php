<?php 
namespace App\Hive\Web;

class Base{
    public $success = array('background' => 'light-green', 'border' => 'green');
    public $warning = array('background' => 'yellow', 'border' => 'green');
    public $danger = array('background' => 'orange', 'border' => 'red');

    public function notification(array $type, $message){
        return array('background' => $type['background'], 'border' => $type['border'], 'message' => $message);
    }
}
?>