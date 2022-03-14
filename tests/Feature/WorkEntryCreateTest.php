<?php

namespace Tests\Feature;

use App\WorkEntry;
use JetBrains\PhpStorm\ArrayShape;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabaseState;

class WorkEntryCreateTest extends TestCase
{
    public function a_new_Work_Entry_is_created(){

        $this->postJson('/api/workEntry', $this->data())->assertStartus(201);

        $this->assertCount(1, WorkEntry::all());

        $this->json('GET', '/api/workEntry/$workEntry->id')->assertStartus(201)->assertJson([

            'data' => [

                'startDate' => "10/02/2021",
                'endDate' => "10/02/2021",
            ]
        ]);
    }

    #[ArrayShape(['startDate' => "string", 'endDate' => "string"])] private function data(): array
    {

        return[
            'startDate' => "10/02/2021",
            'endDate' => "10/02/2021"
        ];
    }

}
