<?php

namespace Tests\Unit;

use App\Actions\DestroyAction;
use App\Http\Resources\FootballPositionResource;
use App\Models\FootballPosition;

use Error;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class DestroyActionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    private int $id = 1;
    private string $model = FootballPosition::class;
    private string $resource = FootballPositionResource::class;

    public function test_found_must_soft_deleted(): void
    {
        $this->assertEquals(
            $this->resource,
            get_class($this->actionExecute())
        );

        $this->assertDatabaseMissing('football_positions', [
            'id' => $this->id,
            'deleted_at' => null
        ]);
    }

    public function test_not_found_must_return_model_not_found_exception(): void
    {
        $this->expectException(ModelNotFoundException::class);

        $this->id = 999;

        $this->actionExecute();
    }

    public function test_model_not_exist_must_return_error_exception(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Class "App\Models\NotExist" not found');

        $this->model = 'App\Models\NotExist';

        $this->actionExecute();
    }

    public function test_resource_not_exist_must_return_error_exception(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Class "App\Http\Resources\NotExist" not found');

        $this->resource = 'App\Http\Resources\NotExist';

        $this->actionExecute();
    }

    private function actionExecute(): mixed
    {
        return (new DestroyAction)->execute(
            id: $this->id,
            model: $this->model,
            resource: $this->resource
        );
    }
}
