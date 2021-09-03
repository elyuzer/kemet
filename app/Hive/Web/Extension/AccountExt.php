<?php 
namespace App\Hive\Web\Extension;

use App\Hive\Web\Base;
use App\Hive\Data\AccountData;
use Exception;
use App\Models\Account;

class AccountExt extends Base{
    private $acc_data;

    public function __construct(){
        $this->acc_data = new AccountData();
    }

    public  function getPaginatedAccounts(){
        try{
            $accounts = Account::paginate(15);
            if(is_null($accounts)){ 
                return $this->notification($this->warning, 'Accounts have not been retrieved successfully');
            }
        }catch(Exception $e){
            return $this->notification($this->danger, 'Error occuured while retrieving accounts');
        }
        return $accounts;
    }
}

?>
