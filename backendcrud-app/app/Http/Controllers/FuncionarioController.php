<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    protected $funcionario;
    public function __construct()
    {
        $this->funcionario = new Funcionario();
    }
    public function index()
    {

        try {
            return response()->json($this->funcionario->all(), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $funcionario = $this->funcionario->create($request->all());
            return response()->json($funcionario, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $funcionario = $this->funcionario->find($id);
            if (!$funcionario) {
                return response()->json(['error' => 'funcionario not found'], 404);
            }
            return response()->json($funcionario, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    public function update(Request $request, string $id)
    {
        try {
            $funcionario = $this->funcionario->find($id);
            if (!$funcionario) {
                return response()->json(['error' => 'funcionario not found'], 404);
            }
            $funcionario->update($request->all());
            return response()->json($funcionario, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    public function destroy(string $id)
    {
        try {
            $funcionario = $this->funcionario->find($id);
            if (!$funcionario) {
                return response()->json(['error' => 'funcionario not found'], 404);
            }
            $funcionario->delete();
            return response()->json(['message' => 'funcionario deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
