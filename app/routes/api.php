<?

use App\Http\Controllers\Api\GamificationController;

Route::get('/users', [GamificationController::class, 'getUsers']); // Pobierz wszystkich użytkowników
Route::post('/users/{id}/add-points', [GamificationController::class, 'addPoints']); // Dodaj punkty
Route::post('/users/{id}/remove-points', [GamificationController::class, 'removePoints']); // Odejmij punkty