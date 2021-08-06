<?php 
namespace App\Hive\Web;

class Base{
    protected function notification(array $type, $message){
        return array('background' => $type['background'], 'border' => $type['border'], 'message' => $message);
    }
}
?>