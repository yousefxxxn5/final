<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class emilpass extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $a=User::where('id',3)->first();
        $a->email='3@0';
        $a->password=Hash::make("778467871");
        $a->save();

    }
}
