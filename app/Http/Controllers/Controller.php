<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confirmation;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of all confirmations.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $confirmations = Confirmation::all();
        return response()->json($confirmations, 200);
    }

    /**
     * Store a newly created confirmation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'evento' => 'required|string|max:255',
            'presenca' => 'required|boolean',
        ]);

        $confirmation = Confirmation::create($validatedData);

        return response()->json([
            'message' => 'Confirmação registrada com sucesso',
            'confirmation' => $confirmation
        ], 201);
    }

    /**
     * Display the specified confirmation.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $confirmation = Confirmation::find($id);

        if (!$confirmation) {
            return response()->json(['message' => 'Confirmação não encontrada'], 404);
        }

        return response()->json($confirmation, 200);
    }

    /**
     * Update the specified confirmation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $confirmation = Confirmation::find($id);

        if (!$confirmation) {
            return response()->json(['message' => 'Confirmação não encontrada'], 404);
        }

        $validatedData = $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'evento' => 'sometimes|required|string|max:255',
            'presenca' => 'sometimes|required|boolean',
        ]);

        $confirmation->update($validatedData);

        return response()->json([
            'message' => 'Confirmação atualizada com sucesso',
            'confirmation' => $confirmation
        ], 200);
    }

    /**
     * Remove the specified confirmation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $confirmation = Confirmation::find($id);

        if (!$confirmation) {
            return response()->json(['message' => 'Confirmação não encontrada'], 404);
        }

        $confirmation->delete();

        return response()->json(['message' => 'Confirmação removida com sucesso'], 200);
    }
}


