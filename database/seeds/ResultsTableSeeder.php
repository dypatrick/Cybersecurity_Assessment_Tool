<?php

use Illuminate\Database\Seeder;
use App\Result;
use Faker\Factory as Faker;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\Result');

        foreach(range(1,100) as $i){
            $result = new Result();
            $result->earned_point = rand(20,140);
            $result->passing_point = 90;
            $result->time_used = rand(10,120) . ' sec';
            $result->user_id = rand(2,53);
            $result->save();
        }
        
    }
}
