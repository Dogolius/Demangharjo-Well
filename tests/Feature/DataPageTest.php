<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_data_page_loads_and_displays_chart_sections()
    {
        $response = $this->get('/data');

        $response->assertStatus(200);
        $response->assertSee('Data Demangharjo');
        $response->assertSee('Distribusi Aduan');
        $response->assertSee('Keaktifan Posting per Bulan');
    }
}
