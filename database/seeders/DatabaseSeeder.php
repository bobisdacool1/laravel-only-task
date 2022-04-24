<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::factory()->count(50)->create();

        for ($i = 0; $i < 50; $i++) {
            User::factory()->create([
                'role_code' => $roles->random()->code,
            ]);
        }


        $news = News::factory()->count(50)->create();

        $newsRoleRelation = [];
        for ($i = 0; $i < 50; $i++) {
            $newsRoleRelation[] = [
                'news_id' => $news->random()->id,
                'role_code' => $roles->random()->code,
            ];
        }

        DB::table('news_role')->insert($newsRoleRelation);
    }
}
