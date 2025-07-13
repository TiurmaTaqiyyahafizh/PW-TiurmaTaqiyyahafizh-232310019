use App\Http\Controllers\AuthController;

Route::get('/sign-up', [AuthController::class, 'showSignupForm'])->name('signup.form');
Route::post('/submit-signup', [AuthController::class, 'processSignup'])->name('signup.process');
Route::get('/signup-success', [AuthController::class, 'signupSuccess'])->name('signup.success');
