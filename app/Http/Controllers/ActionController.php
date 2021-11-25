<?php

namespace App\Http\Controllers;

use App\Actions\DestroyAction;
use App\Actions\IndexAction;
use App\Actions\ShowAction;
use App\Actions\StoreAction;
use App\Actions\UpdateAction;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    private string $collection;
    private string $model;
    private string $orderByColumn;
    private string $orderByDirection;
    private array $relationships;
    private string $resource;

    function __construct(
        string $collection,
        string $model,
        string $orderByColumn,
        string $orderByDirection = 'asc',
        array $relationships,
        string $resource
    )
    {
        $this->collection = $collection;
        $this->model = $model;
        $this->orderByColumn = $orderByColumn;
        $this->orderByDirection = $orderByDirection;
        $this->relationships = $relationships;
        $this->resource = $resource;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new IndexAction)->execute(
            collection: $this->collection,
            model: $this->model,
            orderByColumn: $this->orderByColumn,
            orderByDirection: $this->orderByDirection,
            relationships: $this->relationships
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return (new StoreAction)->execute(
            data: $request->all(),
            model: $this->model
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (new ShowAction)->execute(
            id: $id,
            model: $this->model,
            resource: $this->resource
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return (new UpdateAction)->execute(
            data: $request->all(),
            id: $id,
            model: $this->model,
            resource: $this->resource
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new DestroyAction)->execute(id: $id, model: $this->model, resource: $this->resource);
    }
}
