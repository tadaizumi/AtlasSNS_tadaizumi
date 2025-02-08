<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'email' => 'aaa@atlas.com',
            'password' => bcrypt('a123a456'),
            'bio' => '',
            'icon_image' => 'a'],
            ['username' => 'Atlas二郎',
            'email' => 'bbb@atlas.com',
            'password' => bcrypt('b123b456'),
            'bio' => '',
            'icon_image' => 'b'],
            ['username' => 'Atlas三郎',
            'email' => 'ccc@atlas.com',
            'password' => bcrypt('c123c456'),
            'bio' => '',
            'icon_image' => 'c'],
            ['username' => 'Atlas四郎',
            'email' => 'ddd@atlas.com',
            'password' => bcrypt('d123d456'),
            'bio' => '',
            'icon_image' => 'd'],
            ['username' => 'Atlas五郎',
            'email' => 'eee@atlas.com',
            'password' => bcrypt('e123e456'),
            'bio' => '',
            'icon_image' => 'e'],
        ]);
    }
}
