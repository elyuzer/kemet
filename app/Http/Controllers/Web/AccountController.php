<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Hive\Data\AccountData;
use App\Hive\Web\Model\AccountMdl;
use App\Hive\Web\Extension\AccountExt;


class AccountController extends Controller
{
    private $acc_data;
    private $acc_mdl;
    private $acc_ext;

    public function __construct()
    {
        $this->acc_data = new AccountData();
        $this->acc_mdl = new AccountMdl();
        $this->acc_ext = new AccountExt();
    }

    public function accounts(Request $request){
        if(Auth::user()->can($this->acc_data->manipulate_account)){
            $accounts = $this->acc_ext->getPaginatedAccounts();

            if(is_object($accounts)){
                return view('w3.index.account')->with(compact('accounts'))
                        ->with('notification', $this->acc_ext->notification($this->acc_ext->success, 'Accounts have been retrieved successfully'))
                        ->with('permission', $this->acc_data->manipulate_account);
            }else{
                return back()->with('notification', $accounts);
            }            
        }else{
            return back()->with('notification', $this->acc_ext->notification($this->acc_ext->warning, 'You are not allowed to create account'));
        }
    }

    public function createAccount(){
        if(Auth::user()->can($this->acc_data->manipulate_account)){

        }else{
            return back()->with('notification', $this->acc_ext->notification($this->acc_ext->warning, 'You are not allowed to create account'));
        }

    }
}
