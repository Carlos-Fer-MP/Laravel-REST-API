<?php

namespace Tests\Feature;

use App\WorkEntry;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;


class UpdateWorkEntryTest extends TestCase
{
    use RefreshDatabase;

    public function a_work_entry_is_updated(){

        $workEntry = factory(WorkEntry::class);

        $this->putJson("/api/workEntry/->$workEntry", [
            'data' => [
                'startDate' => '10/02/2021',
                'endDate' => '10/02/2021'
            ]
        ])->assertStatus(200);

        $this->json('GET', "/api/workEntry/$workEntry->id")->assertStatus(200)->assertJson([
            'data' => [
                'startDate' => '10/02/2021',
                'endDate' => '10/02/2021'
            ]
        ]);

    }

}
