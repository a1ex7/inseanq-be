<?php

namespace Tests\Feature;

use App\Models\Group;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Assert;
use Tests\TestCase;

class GroupsTest extends TestCase
{
    use RefreshDatabase;

    public function testGetGroups(): void
    {
        $group = factory(Group::class)->create();
        $response = $this->get('/groups');
        $response->assertStatus(200);
        $response->assertSee($group->number);
        $response->assertSee($group->course);
        $response->assertSee($group->faculty);
    }

    public function testCreateGroup(): void
    {
        $group = factory(Group::class)->make();
        $this->post('groups', $group->toArray());
        Assert::assertEquals(1, Group::all()->count());
    }

    public function testUpdateGroup(): void
    {
        $group = factory(Group::class)->create();
        $group->number = 'Updated Number';
        $group->course = '1';
        $group->faculty = 'Updated Faculty';
        $this->put('groups/' . $group->id, $group->toArray());
        $this->assertDatabaseHas('groups', [
            'id'      => $group->id,
            'number'  => 'Updated Number',
            'course'  => '1',
            'faculty' => 'Updated Faculty',
        ]);
    }

    public function testDeleteGroup(): void
    {
        $group = factory(Group::class)->create();
        $this->delete('groups/' . $group->id);
        $this->assertDatabaseMissing('groups', ['id' => $group->id]);
    }
}
