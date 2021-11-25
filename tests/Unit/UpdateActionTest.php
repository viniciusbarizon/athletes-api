<?php

namespace Tests\Unit;

use App\Actions\UpdateAction;
use App\Models\Sport;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class UpdateActionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    private int $id = 1;
    private string $model = Sport::class;
    private array $sport;

    public function test_update_must_have_new_values()
    {
        $this->setSportUsingTheFactory();

        $this->actionExecute();
        $this->assertDatabaseHas('sports', $this->sport);
    }

    private function setSportUsingTheFactory(): void
    {
        $this->sport = Sport::factory()->make()->toArray();
    }

    private function actionExecute(): void
    {
        (new UpdateAction)->execute(data: $this->sport, id: $this->id, model: $this->model);
    }

}
