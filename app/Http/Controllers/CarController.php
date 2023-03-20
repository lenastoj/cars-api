<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCarRequest;
use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = $request->query('per_page', '');
        $page = $request->query('page', '');

        $brand = $request->query('brand', '');
        $model = $request->query('model', '');

        // $cars = Car::paginate($per_page = 5, $columns = ['*'], $pageName = 'page', $page = 3);
        // $cars = Car::paginate($per_page, ['*'],'page', $page);

        $cars = Car::searchByBrand($brand)
        ->searchByModel($model) 
        ->paginate($per_page, ['*'],'page', $page);

        return response()->json($cars);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {

        $car = Car::create($request->validated());

        return response()->json($car);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, string $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->validated());
        return response()->json($car);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
    }
}
