<?php

namespace Database\Seeders;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name'       => 'ADMIN',
            'email'      => 'admin@gmail.com',
            'password'   => bcrypt(123456789),
            'phone'      => '0986420990',
            'address'    => 'Nghệ An',
            'created_at' => Carbon::now()
        ]);
    }
}
