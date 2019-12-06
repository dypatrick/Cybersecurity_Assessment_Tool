<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Anh";
        $user->username = "admin";
        $user->password = Hash::make('password');
        $user->email = "admin@gmail.com";
        $user->company = "Marshall";
        $user->industry = "CS";
        $user->phone = "123-456-7890";
        $user->address = "123 Huntington, WV, 25703";
        $user->city = "Huntington";
        $user->state = "WV";
        $user->zipcode = "25703";
        $user->jobtitle = "Student";
        $user->isactive = true;
        $user->role = "admin";
        $user->save();

        $user = new User();
        $user->name = "Mickey";
        $user->username = "test2";
        $user->password = Hash::make('password');
        $user->email = "test2@gmail.com";
        $user->company = "Marshall";
        $user->industry = "CS";
        $user->phone = "123-456-7890";
        $user->address = "123 Huntington, WV, 25703";
        $user->city = "Huntington";
        $user->state = "WV";
        $user->zipcode = "25703";
        $user->jobtitle = "Student";
        $user->isactive = true;
        $user->role = "user";
        $user->save();
    }
}
