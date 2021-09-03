<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Hive\Data\AccountData;
use App\Hive\Data\PublicationData;
use App\Hive\Data\ItemData;
use App\Hive\Data\CustomerData;
use App\Hive\Data\DistributionData;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{

    private $acc_data;
    private $pub_data;
    private $item_data;
    private $cust_data;
    private $dist_data;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->acc_data = new AccountData();
        $this->pub_data = new PublicationData();
        $this->item_data = new ItemData();
        $this->cust_data = new CustomerData();
        $this->dist_data = new DistributionData();


        $permissions = array();

        array_push($permissions, 
                $this->acc_data->admin,
                $this->acc_data->manipulate_account,
                $this->acc_data->manipulate_role,
                $this->acc_data->assign_role_permission,
                $this->acc_data->assign_user_role,
                $this->acc_data->assign_account_organisation,
                $this->acc_data->assign_account_group,
                $this->acc_data->manipulate_contact,

                $this->pub_data->manipulate_publication,
                $this->pub_data->manipulate_product,
                $this->pub_data->manipulate_document,
                $this->pub_data->internal_document_status,
                $this->pub_data->manipulate_external_document,

                
                $this->item_data->manipulate_item,
                $this->item_data->assign_product_item,
                $this->item_data->manipulate_service,
                $this->item_data->assign_unit,
                $this->item_data->assign_item_service,
                $this->item_data->item_ties,
                $this->item_data->manipulate_item_service,

                $this->cust_data->manipulate_customer,
                $this->cust_data->manipulate_subscription_period,
                $this->cust_data->assign_item_period,
                $this->cust_data->assign_item_media,
                $this->cust_data->manipulate_customer_item_subscription,
                $this->cust_data->manipulate_publisher,
                $this->cust_data->assign_customer_publisher,
                $this->cust_data->assign_customer_publisher_document,

                $this->dist_data->manipulate_distribution,
                $this->dist_data->dispatch_distribution,
                $this->dist_data->distribution_feedback,
                $this->dist_data->email_document,

            );

        for($i = 0; $i < count($permissions); $i++){
            Permission::firstOrCreate(
                array('name' => $permissions[$i]['name']), 
                array('name' => $permissions[$i]['name'], 'guard_name' => 'web')
            );
        }
        
    }
}
