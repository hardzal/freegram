<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    // protected function tearDown(): void
    // {
    // }

    /** @test */
    public function onlyLoggedUserCanCreateAPost()
    {
        $response = $this->get('/p/create');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticatedUsersCanCreateAPost()
    {
        $this->actingAs(factory(User::class)->create());

        $this->get('/p/create')
            ->assertOk();
    }

    /** @test */
    public function userCanAPostThroughForm()
    {
        // event::fake
        $this->actingAs(factory(User::class)->create());

        Storage::fake('image');

        $response = $this->post('/p', $this->data());

        $this->assertCount(1, User::all());
    }

    /** @test */
    public function aRequiredCaption()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->post('/p', array_merge($this->data(), ['caption' => '']));
        $response->assertSessionHasErrors('caption');

        $this->assertCount(1, User::all());
    }

    private function data()
    {
        return [
            'user_id' => 1,
            'caption' => 'Another post',
            'image' => UploadedFile::fake()->image('image.jpg')
        ];
    }
}
