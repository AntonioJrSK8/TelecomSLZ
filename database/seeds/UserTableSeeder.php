<?php

use App\Models\User;
use App\Models\UserProfiles;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@user.com',
            'enrolment' => '1001'
        ])->each(function(User $user){
            
            $profile = factory(UserProfiles::class)->make();
            $user->profile()->create($profile->toArray());

            User::assignRole($user, User::ROLE_ADMIN);
            $user->save();
        });
    }
}
