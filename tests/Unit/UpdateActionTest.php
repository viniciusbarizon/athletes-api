<?php

namespace Tests\Unit;

use App\Actions\UpdateAction;
use App\Models\Sport;
use App\Http\Resources\SportResource;

use Error;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class UpdateActionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    private int $id = 1;
    private string $model = Sport::class;
    private array $sport;
    private string $resource = SportResource::class;

    public function test_update_must_have_new_values(): void
    {
        $this->setSportUsingTheFactory();

        $this->assertEquals(
            $this->resource,
            get_class($this->actionExecute())
        );

        $this->assertDatabaseHas('sports', $this->sport);
    }

    public function test_not_found_must_return_model_not_found_exception(): void
    {
        $this->expectException(ModelNotFoundException::class);

        $this->id = 999;
        $this->setSportUsingTheFactory();

        $this->actionExecute();
    }

    public function test_model_not_exist_must_return_error_exception(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Class "App\Models\NotExist" not found');

        $this->setSportUsingTheFactory();
        $this->model = 'App\Models\NotExist';

        $this->actionExecute();
    }

    public function test_column_duplicated_must_return_query_exception(): void
    {
        $this->sport = ['sport' => 'Karaté'];

        $this->assertEquals($this->actionExecute()->getStatusCode(), 403);
    }

    private function setSportUsingTheFactory(): void
    {
        $this->sport = Sport::factory()->make()->toArray();
    }

    private function actionExecute(): mixed
    {
        return (new UpdateAction)->execute(
            data: $this->sport,
            id: $this->id,
            model: $this->model,
            resource: $this->resource
        );
    }
}
