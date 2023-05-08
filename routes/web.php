<?php

use App\Models\Comments;
use App\Models\Space;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $spaces = Space::whereHas('images')->with('images')->get();
    return inertia('Index', ['spaces' => $spaces]);
});

Route::get('/spaces', function () {
    $spaces = Space::with('images')->get();
    return inertia('SpaceList', ['spaces' => $spaces]);
});

Route::get('/spaces/{id}', function ($id) {
    $space = Space::with(['images','city','type', 'comments'=>['user:id,name']])->find($id);
    return inertia('SpaceDetails', ['space' => $space]);
});





Route::post('/comment', function (Request $request) {
    $comment = $request->validate([
        'valoration' => ['required', 'max:5', 'min:1'],
        'message' => ['string'],
        'space_id' => ['required']
    ]);
    $comment['user_id'] = auth()->user()->id;
    $comment['is_validated'] = 0;

    Comments::create($comment);
});





// Autenticación
Route::get('/login', function () {
    return inertia('Login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    return back()->withErrors([
        'email' => 'El usuario no existe',
    ])->onlyInput('email');
});


Route::post('/logout', function () {
    Auth::logout();
});


//Register
Route::get('/register', function() {
    return inertia('Register');
});

Route::post('/register', function (Request $request) {
    $user = $request->validate([
        'name' => ['required', 'string'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:3', 'max:20', 'string'],
        'dni' => ['required', 'regex:/[0-9]{8}[A-Z]/'],
    ]);

    $newUser = new User();
    $newUser->name = $user['name'];
    $newUser->email = $user['email'];
    $newUser->password = bcrypt($user['password']);
    $newUser->is_admin = 0;
    $newUser->dni = $user['dni'];

    if ($newUser->save()) {
        return redirect()->intended('/');
    }


});
