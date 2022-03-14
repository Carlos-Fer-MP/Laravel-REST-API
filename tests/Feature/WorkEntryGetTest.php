<?php

namespace Tests\Feature;

use App\WorkEntry;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabaseState;

class WorkEntryGetTest extends TestCase
{
    public function a_Work_Entry_is_retrieved(){

        $this->assertCount(1, WorkEntry::all());

        $workEntry = WorkEntry::first();

        $this->json('GET', '/api/workEntry/$workEntry->id')->assertStatus(200)->assertJson([

            'data' => [
                'is' => $workEntry->id,
                'userId' => $workEntry->userId,
                'startDate' => $workEntry->startDate,
                'endDate' => $workEntry->endDate
            ]

        ]);

    }

}
