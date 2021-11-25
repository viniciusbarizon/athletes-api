<?php

namespace Tests\Unit;

use App\Actions\ShowAction;
use App\Models\KarateBelt;
use App\Http\Resources\KarateBeltResource;

use Error;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Tests\TestCase;

class ShowActionTest extends TestCase
{
    private int $id = 1;
    private string $model = KarateBelt::class;
    private string $resource = KarateBeltResource::class;

    public function test_model_and_resource_were_found_must_return_the_karate_belt_resource(): void
    {
        $this->assertEquals($this->resource, get_class($this->actionExecute()));
    }

    public function test_id_not_exist_must_return_not_found_exception(): void
    {
        $this->expectException(ModelNotFoundException::class);

        $this->id = 999;

        $this->actionExecute();
    }

    public function test_model_not_exist_must_return_error_exception()
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Class "App\Models\NotExist" not found');

        $this->model = 'App\Models\NotExist';

        $this->actionExecute();
    }

    public function test_resource_not_exist_must_return_error_exception()
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Class "App\Http\Resources\NotExist" not found');

        $this->resource = 'App\Http\Resources\NotExist';

        $this->actionExecute();
    }

    private function actionExecute(): KarateBeltResource
    {
        return (new ShowAction)->execute(
            id: $this->id,
            model: $this->model,
            resource: $this->resource
        );
    }
}
