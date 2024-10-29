<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class CarController extends Controller
{
    public function index()
    {
        $Car = Car::all();
        return response()->json([
            'status' => true,
            'message' => 'Cars retrieved successfully',
            'data' => $Car
        ], 200);
    }

    public function show($id)
    {
        $Car = Car::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Car found successfully',
            'data' => $Car
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'idade' => 'required|numeric',
            'cpf' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $Car = Car::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Car created successfully',
            'data' => $Car
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'placa' => 'required|string|max:10',
            'quilometragem' => 'required|numeric',
            'modelo' => 'required|string|max:50',
            'marca' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $Car = Car::findOrFail($id);
        $Car->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Car updated successfully',
            'data' => $Car
        ], 200);
    }

    public function destroy($id)
    {
        $Car = Car::findOrFail($id);
        $Car->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Car deleted successfully'
        ], 204);
    }
}
