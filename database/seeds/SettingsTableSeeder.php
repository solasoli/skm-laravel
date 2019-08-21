<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$settings = [
    		[
    			'key' => 'registration',
    			'value' => [
                    'value' => true,
                    'type' => 'select'
                ]
    		],
    		[
    			'key' => 'verifyemail',
    			'value' => [
                    'value' => false,
                    'type' => 'select'
                ]
    		],
    		[
    			'key' => 'defaultrole',
    			'value' => [
                    'value' => 'roles',
                    'type' => 'database'
                ]
    		],
    		[
    			'key' => 'sitename',
    			'value' => [
                    'value' => 'Gentelella Laravel',
                    'type' => 'text'
                ]
    		]
    	];

    	foreach($settings as $s)
        {
            $setting = setting([$s['key'] => $s['value']])->save();
        }
    }
}
