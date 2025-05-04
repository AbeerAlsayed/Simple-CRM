<?php

// database/seeders/ClientSeeder.php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $clients = [
            ['Walter-Mertz', '68691', '66494 Bertram Brooks Suite 874 Beierstad, ID 67327-1782'],
            ['Daugherty Inc', '25607', '25577 Hayes Manors Apt. 075 Port Cruzshire, AR 38243'],
            ['Windler Group', '68376', '567 Susie Camp Apt. 348 Lake Candidoside, DE 12965-7080'],
            ['McKenzie PLC', '16167', '3975 Schoen Ports Stephammouth, WY 66372'],
            ['Christiansen, Bailey and Baumbach', '31561', '65903 Nolan Expressway Suite 927 North Burniceshire, WI 58457-3668'],
            ['Barrows Inc', '2266', '1804 Brandyn Lodge Suite 653 Lake Rozella, VT 64221-6410'],
            ['Runte-Jakubowski', '64870', '1388 Owen Trail Leannonton, NV 82426'],
            ['Schoen-Gleason', '72753', '19021 Christina Village Kobyland, NJ 52119'],
        ];

        foreach ($clients as $client) {
            Client::create([
                'name' => $client[0],
                'vat' => $client[1],
                'address' => $client[2],
                'email' => strtolower(str_replace([' ', ',', '-'], '', $client[0])) . '@example.com',
                'phone' => '1-' . rand(200, 999) . '-' . rand(200, 999) . '-' . rand(1000, 9999),
                'is_active' => true,
            ]);
        }

        // Create additional random clients
        Client::factory(10)->create();
    }
}
