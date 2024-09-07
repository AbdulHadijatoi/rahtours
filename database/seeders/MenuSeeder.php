<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuType::create(['name'=>"primary"]);
        MenuType::create(['name'=>"secondary"]);
        
        $menus = [
            ['slug' => '/', 'name' => 'Home', 'menu_type_id' => 1],
            ['slug' => 'who-we-are', 'name' => 'Who We Are', 'menu_type_id' => 1],
            ['slug' => 'dry-cargo', 'name' => 'Dry Cargo', 'menu_type_id' => 1],
            ['slug' => 'reefer-cargo', 'name' => 'Reefer Cargo', 'menu_type_id' => 1],
            ['slug' => 'liquid-cargo', 'name' => 'Liquid Cargo', 'menu_type_id' => 1],
            ['slug' => 'project-cargo', 'name' => 'Project Cargo', 'menu_type_id' => 1],
            ['slug' => 'container-haulage', 'name' => 'Container Haulage', 'menu_type_id' => 1],
            ['slug' => 'contact-us', 'name' => 'Contact Us', 'menu_type_id' => 1],
            
            ['slug' => 'automotive-shipping', 'name' => 'Automotive Shipping', 'menu_type_id' => 2],
            ['slug' => 'dangerous-good-shipping', 'name' => 'Dangerous Good Shipping', 'menu_type_id' => 2],
            ['slug' => 'cargo-storage-solutions', 'name' => 'Cargo Storage Solutions', 'menu_type_id' => 2],
            ['slug' => 'exworks-solutions', 'name' => 'Exworks Solutions', 'menu_type_id' => 2],
            ['slug' => 'container-trading', 'name' => 'Container Trading', 'menu_type_id' => 2],
            ['slug' => 'container-bl-tracking', 'name' => 'Container BL Tracking', 'menu_type_id' => 2],
            ['slug' => 'client-reg-login', 'name' => 'Client Registration & Login', 'menu_type_id' => 2],
            ['slug' => 'freight-rate', 'name' => 'Freight Rate', 'menu_type_id' => 2],
            ['slug' => 'get-quote', 'name' => 'Get a Quote', 'menu_type_id' => 2],
            ['slug' => 'general-tariff', 'name' => 'General Tariff', 'menu_type_id' => 2],
            ['slug' => 'quick-payment', 'name' => 'Quick Payment', 'menu_type_id' => 2],
            ['slug' => 'terms-conditions', 'name' => 'Terms & Conditions', 'menu_type_id' => 2],
            ['slug' => 'privacy-policy', 'name' => 'Privacy Policy', 'menu_type_id' => 2],
            ['slug' => 'blogs-news', 'name' => 'Blogs & News', 'menu_type_id' => 2],
        ];

        foreach ($menus as $menu) {
            DB::table('menus')->insert([
                'slug' => $menu['slug'],
                'name' => $menu['name'],
                'menu_type_id' => $menu['menu_type_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
