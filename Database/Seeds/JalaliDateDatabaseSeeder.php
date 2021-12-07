<?php

namespace Modules\JalaliDate\Database\Seeds;

use App\Abstracts\Model;
use Illuminate\Database\Seeder;

class JalaliDateDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");

        Model::reguard();
    }
}
