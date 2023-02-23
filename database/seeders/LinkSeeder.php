<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('links')->insert([
            'hot_line' => '116',
            'phone_am' => '116 (Երկ–Ուրբ) +374 (010) 537651 (Շբթ–Կիր)',
            'phone_en' => '116 (Mon-Fri) +374 (010) 537651 (Sat-Sun)',
            'mail' => 'ombuds@ombuds.am',
			'web' => 'https://ombuds.am',
            'web_name' => 'ombuds.am',
			'location' => 'http://surl.li/dyysj',
            'location_am' => 'Պուշկին փ․56ա, Երևան',
            'location_en' => '56a Pushkin St, Yerevan',
			'facebook' => 'https://www.facebook.com/KristinneGrigoryan',
			'instagram' => 'https://www.instagram.com/ombudsman_armenia/',
			'twitter' => 'https://twitter.com/OmbudsArmenia',
			'telegram' => 'https://telegram.com/',
			'messenger' => 'https://www.facebook.com/HRDOLegalCounsel',
			'e-gov' => 'https://e-gov.am',
			'e-request' => 'https://e-request.am'
        ]);
    }
}