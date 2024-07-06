<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Mobile;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function add_customer()
    {
        $mobile = new Mobile();
        $mobile->model = "vivoV20";

        $customer = new Customer();

        $customer->name = "Samaun";
        $customer->email = "samaun@gmail.com";

        $customer->save();

        $customer->mobile()->Save($mobile);
    }

    public function show_mobile($id)
    {
        $customer_data = Customer::find($id)->mobile;

        return $customer_data;
    }

    public function all_customer()
    {
        #$all_customer = Customer::all()->dd();
        $all_customer = Customer::get()->dd();
    }
}
