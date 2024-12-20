<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GamificationController extends Controller
{
    // Pobierz wszystkich użytkowników z ich punktami
    public function getUsers()
    {
        return response()->json(User::all(), 200);
    }

    // Dodaj punkty użytkownikowi
    public function addPoints(Request $request, $id)
    {
        // Znajdź użytkownika po ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Walidacja danych wejściowych
        $validated = $request->validate([
            'points' => 'required|integer|min:1',
        ]);

        // Dodaj punkty i zapisz użytkownika
        $user->points += $validated['points'];
        $user->save();

        return response()->json([
            'message' => 'Points added successfully',
            'user' => $user
        ], 200);
    }

    // Odejmij punkty użytkownikowi
    public function removePoints(Request $request, $id)
    {
        // Znajdź użytkownika po ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Walidacja danych wejściowych
        $validated = $request->validate([
            'points' => 'required|integer|min:1',
        ]);

        // Upewnij się, że użytkownik nie ma ujemnych punktów
        if ($user->points < $validated['points']) {
            return response()->json([
                'error' => 'User does not have enough points'
            ], 400);
        }

        // Odejmij punkty i zapisz użytkownika
        $user->points -= $validated['points'];
        $user->save();

        return response()->json([
            'message' => 'Points removed successfully',
            'user' => $user
        ], 200);
    }
}
