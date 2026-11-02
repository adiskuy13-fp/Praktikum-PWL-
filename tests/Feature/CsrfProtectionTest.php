<?php

namespace Tests\Feature;

use Tests\TestCase;

class CsrfProtectionTest extends TestCase
{
    public function test_login_page_displays_csrf_token(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
        $response->assertSee('name="_token"', false);
    }
}