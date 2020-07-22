<?php
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::query()->create([
            'name' => 'Admin',
            'email' => 'test@test.com',
            'password' => bcrypt('123456'),
        ]);
        $user->attachRole('admin');
    }
}
