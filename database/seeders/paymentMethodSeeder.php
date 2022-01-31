<?php

namespace Database\Seeders;

use App\Models\payment_method;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class paymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->delete();
        foreach ($this->status() as $key => $status){
            $status['created_at'] = now();
            $status['updated_at'] = now();
            payment_method::create($status);
        }
    }

    private function status(){

        return[
            [
                "id" => 1,
                "name" => "Cash On Delivery",
            ],
        ];

    }
}
