<?php

namespace Tests\Feature;

use App\WorkEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;

class DeleteWorkEntryTest extends TestCase
{

use RefreshDatabase;

public function a_Work_Entry_is_deleted()
{
        $workEntry = factory(WorkEntry::class)->create();

        $this->assertCount(1, WorkEntry::all());

        $this->json('DELETE'. "/api/workEntry/$workEntry->id")->assertStatus(204);

        $this->assertCount(0, WorkEntry::all());
}

}
