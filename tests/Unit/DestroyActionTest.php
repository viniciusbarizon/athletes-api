<?php

namespace Tests\Unit;

use App\Actions\DestroyAction;
use App\Http\Resources\FootballPositionResource;
use App\Models\FootballPosition;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class DestroyActionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    private int $id = 1;
    private string $model = FootballPosition::class;

    public function test_found_must_soft_deleted()
    {
        $this->actionExecute();

        $this->assertDatabaseMissing('football_positions', [
            'id' => $this->id,
            'deleted_at' => null
        ]);
    }

    private function actionExecute(): mixed
    {
        return (new DestroyAction)->execute(
            id: $this->id,
            model: $this->model,
            resource: FootballPositionResource::class
        );
    }
}
