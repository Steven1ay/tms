<?php

use Illuminate\Database\Seeder;
use App\Model\Groups;
class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Groups::save();
        DB::table('groups')->insert([
            [
                'name' => '团队文档',
                'owner_name' => '管理员',
                'u_id' => 1,
                'type' => 1,
            ]
        ]);
    }
}
