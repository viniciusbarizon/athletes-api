<?php

namespace App\Http\Controllers;

use App\Actions\IndexAction;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    private string $collection;
    private string $model;
    private string $orderByColumn;
    private string $orderByDirection;
    private array $relationships;

    function __construct(
        string $collection,
        string $model,
        string $orderByColumn,
        string $orderByDirection = 'asc',
        array $relationships
    )
    {
        $this->collection = $collection;
        $this->model = $model;
        $this->orderByColumn = $orderByColumn;
        $this->orderByDirection = $orderByDirection;
        $this->relationships = $relationships;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new IndexAction)->execute(
            $this->collection,
            $this->model,
            $this->orderByColumn,
            $this->orderByDirection,
            $this->relationships
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
