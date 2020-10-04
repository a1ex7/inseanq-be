<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Assert;
use Tests\TestCase;

class StudentsTest extends TestCase
{
    use RefreshDatabase;

    public function testGetStudents(): void
    {
        $group = factory(Group::class)->create();
        $student = factory(Student::class)->create(['group_id' => $group->id]);
        $response = $this->get('/students');
        $response->assertStatus(200);
        $response->assertSee($student->firstname);
        $response->assertSee($student->bithday);
        $response->assertSee($group->number);
    }

    public function testCreateStudent(): void
    {
        $student = factory(Student::class)->make();
        $this->post('students', $student->toArray());
        Assert::assertEquals(1, Student::all()->count());
    }

    public function testUpdateStudent(): void
    {
        $student = factory(Student::class)->create();
        $student->firstname = 'Updated Firstname';
        $student->birthday = now()->subYears(18)->toDateString();
        $this->put('students/' . $student->id, $student->toArray());
        $this->assertDatabaseHas('students', [
            'id'        => $student->id,
            'firstname' => 'Updated Firstname',
            'birthday'  => $student->birthday,
        ]);
    }

    public function testDeleteStudent(): void
    {
        $student = factory(Student::class)->create();
        $this->delete('students/' . $student->id);
        $this->assertDatabaseMissing('students', ['id' => $student->id]);
    }
}
