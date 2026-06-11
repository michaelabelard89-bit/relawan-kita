<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        User::create(['name'=>'Admin RelawanKita','email'=>'admin@relawankita.com','password'=>Hash::make('admin123'),'role'=>'admin']);
        User::create(['name'=>'Budi Santoso','email'=>'user@relawankita.com','password'=>Hash::make('user123'),'role'=>'user']);
    }
}