<?php

namespace Tests\Unit;

use App\Actions\StoreAction;
use App\Models\KarateType;
use App\Http\Resources\KarateTypeResource;

use Error;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class StoreActionTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    private string $model = KarateType::class;
    private array $karateType;
    private string $resource = KarateTypeResource::class;

    public function test_model_found_and_data_is_correct_must_insert_a_new_karate_type(): void
    {
        $this->setKarateTypeUsingTheFactory();

        $this->assertEquals(
            $this->resource,
            get_class($this->actionExecute())
        );

        $this->assertInsert();
    }

    public function test_model_not_exist_must_return_error_exception(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Class "App\Models\NotExist" not found');

        $this->setKarateTypeUsingTheFactory();

        $this->model = 'App\Models\NotExist';

        $this->actionExecute();
    }

    public function test_column_not_exist_must_return_query_exception(): void
    {
        $this->karateType = ['not_exist' => 'not_exist'];

        $this->assertEquals($this->actionExecute()->getStatusCode(), 403);
    }

    public function test_column_duplicated_must_return_query_exception(): void
    {
        $this->karateType = ['type' => 'Shotokan-ryu'];

        $this->assertEquals($this->actionExecute()->getStatusCode(), 403);
    }

    private function setKarateTypeUsingTheFactory(): void
    {
        $this->karateType = KarateType::factory()->make()->toArray();
    }

    private function actionExecute(): mixed
    {
        return (new StoreAction)->execute(
            data: $this->karateType,
            model: $this->model,
            resource: $this->resource
        );
    }

    private function assertInsert(): void
    {
        $this->assertDatabaseHas('karate_types', ['type' => $this->karateType['type']]);
    }
}
