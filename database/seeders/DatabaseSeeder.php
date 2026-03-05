<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Issue;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Employee::factory(10)->create();

        // создаем СИЗ
        Item::factory(15)->create();

        // создаем выдачи
        Issue::factory(30)->create();

        // создаем администратора
        Employee::create([
            'full_name' => 'Администратор',
            'position' => 'Администратор',
            'department' => 'IT',
        ]);
    }
}
