<?php

namespace Tests\Feature;


use PHPUnit\Framework\TestCase;
use App\WorkEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

class GetByIdWorkEntryTest extends TestCase
{
    public function a_Work_Entry_is_retrieved_By_Id(){

        $this->assertCount(1, WorkEntry::all());

        $workEntry = WorkEntry::first();

        $this->json('GET', '/api/workEntry/$workEntry->userId')->assertStatus(200)->assertJson([

            'data' => [
                'is' => $workEntry->id,
                'userId' => $workEntry->userId,
                'startDate' => $workEntry->startDate,
                'endDate' => $workEntry->endDate
            ]

        ]);

    }


}
