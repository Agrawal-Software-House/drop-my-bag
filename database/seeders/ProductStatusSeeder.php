<?php

namespace Database\Seeders;

use App\Models\product_status_type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_status_types')->delete();
        foreach ($this->status() as $key => $status){
            $status['created_at'] = now();
            $status['updated_at'] = now();
            product_status_type::create($status);
        }
    }

    private function status(){

        return[
            [
                "id" => 1,
                "name" => "Pending",
            ],
            [
                "id" => 2,
                "name" => "Approved",
            ],
            [
                "id" => 3,
                "name" => "Disapproved",
            ],
        ];

    }
}
