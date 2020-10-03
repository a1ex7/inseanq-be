<?php

use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Group::class, 10)
            ->create()
            ->each(function ($group) {
                $students = factory(Student::class, 30)->make();
                $group->students()->saveMany($students);
            });
    }
}
