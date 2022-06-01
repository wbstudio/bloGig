<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dataList = [
            [
                'email' => 'adminwbstudio2022',
                'password' => 'Zxcvbnm123',
            ],
        ];

        foreach($dataList as $data) {
            $mdAdmin = new Admin();
            $mdAdmin->email = $data['email'];
            $mdAdmin->password = Hash::make($data['password']);
            $mdAdmin->created_at = now();
            $mdAdmin->updated_at = now();
            $mdAdmin->save();
        }
    }
}
