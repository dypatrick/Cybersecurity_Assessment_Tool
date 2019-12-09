<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('App\User');

        $user = new User();
        $user->name = "Anh Nguyen";
        $user->username = "admin";
        $user->password = Hash::make('password');
        $user->email = "admin@gmail.com";
        $user->company = "Marshall";
        $user->industry = "CS";
        $user->phone = "123-456-7890";
        $user->address = "123 Huntington, WV, 25703";
        $user->city = "Huntington";
        $user->state = "West Virginia";
        $user->zipcode = "25703";
        $user->jobtitle = "Student";
        $user->isactive = true;
        $user->role = "admin";
        $user->save();

        $user = new User();
        $user->name = "Mickey Mouse";
        $user->firstname = "Mickey";
        $user->lastname = "Mouse";
        $user->username = "test";
        $user->password = Hash::make('password');
        $user->email = "test@gmail.com";
        $user->company = "Marshall";
        $user->industry = "CS";
        $user->phone = "123-456-7890";
        $user->address = "123 Huntington, WV, 25703";
        $user->city = "Huntington";
        $user->state = "West Virginia";
        $user->zipcode = "25703";
        $user->jobtitle = "Student";
        $user->isactive = true;
        $user->role = "user";
        $user->save();

        foreach(range(1,25) as $i)
        {
            $user = new User();
            $user->firstname = $faker->firstName();
            $user->lastname = $faker->lastName();
            $user->name = $user->firstname . ' ' . $user->lastname;
            $user->username = "test" . $i;
            $user->password = Hash::make('password');
            $user->email = "test" . $i . "@gmail.com";
            $user->company = $faker->company();
            $user->industry = $faker->company();
            $user->phone = $faker->phoneNumber();
            $user->address = $faker->address();
            $user->city = $faker->city();
            $user->state = $faker->state();
            $user->zipcode = "25703";
            $user->jobtitle = $faker->jobTitle();
            $user->isactive = true;
            $user->role = "user";
            $user->save();
        }

        foreach(range(26,50) as $i)
        {
            $user = new User();
            $user->firstname = $faker->firstName();
            $user->lastname = $faker->lastName();
            $user->name = $user->firstname . ' ' . $user->lastname;
            $user->username = "test" . $i;
            //$user->password = Hash::make('password');
            $user->email = "test" . $i . "@gmail.com";
            $user->company = $faker->company();
            $user->industry = $faker->company();
            $user->phone = $faker->phoneNumber();
            $user->address = $faker->address();
            $user->city = $faker->city();
            $user->state = $faker->state();
            $user->zipcode = "25703";
            $user->jobtitle = $faker->jobTitle();
            $user->isactive = true;
            $user->role = "user";
            $user->save();
        }
    }
}
