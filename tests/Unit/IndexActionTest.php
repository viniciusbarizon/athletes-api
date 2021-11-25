<?php

namespace Tests\Unit;

use App\Actions\IndexAction;
use App\Http\Resources\FootballPositionCollection;
use App\Models\FootballPosition;

use Error;

use Illuminate\Database\Eloquent\RelationNotFoundException;
use Illuminate\Database\QueryException;

use Tests\TestCase;

class IndexActionTest extends TestCase
{
    private string $collection = FootballPositionCollection::class;
    private string $model = FootballPosition::class;
    private string $orderByColumn = 'position';
    private string $orderByDirection = 'asc';
    private array $relationships = ['footballPlayer'];

    public function test_model_found_must_return_the_football_position_collection(): void
    {
        $this->actionExecute();

        $this->assertEquals(FootballPositionCollection::class, get_class($this->actionReturn));
    }

    public function test_collection_not_found_must_return_error_exception(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Class "App\Http\Resources\NotExistCollection" not found');

        $this->collection = 'App\Http\Resources\NotExistCollection';

        $this->actionExecute();
    }

    public function test_model_not_exist_must_return_error_exception(): void
    {
        $this->expectException(Error::class);
        $this->expectExceptionMessage('Class "App\Models\DoesNotExist" not found');

        $this->model = 'App\Models\DoesNotExist';

        $this->actionExecute();
    }

    public function test_order_by_column_not_exist_must_return_query_exception(): void
    {
        $this->expectException(QueryException::class);

        $this->orderByColumn = 'not_exist';

        $this->actionExecute();
    }

    public function test_relationships_not_exist_must_return_relation_not_found_exception(): void
    {
        $this->expectException(RelationNotFoundException::class);

        $this->relationships = ['not_exist'];

        $this->actionExecute();
    }

    private function actionExecute(): void
    {
        $this->actionReturn = (new IndexAction)->execute(
            $this->collection,
            $this->model,
            $this->orderByColumn,
            $this->orderByDirection,
            $this->relationships
        );
    }
}
