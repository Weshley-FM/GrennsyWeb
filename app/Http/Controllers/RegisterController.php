<?php
namespace App\Http\Controllers; // Pastikan namespace Anda adalah ini

use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    use RegistersUsers; // Ini menggunakan trait-nya

    protected $redirectTo = RouteServiceProvider::HOME; // Akan redirect ke '/' setelah register/login

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm() // PASTIKAN METHOD INI ADA DAN NAMANYA PERSIS SAMA
    {
        return view('auth.register'); // Pastikan view ini ada di resources/views/auth/register.blade.php
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? response()->json([], 201)
                    : redirect($this->redirectPath())->with('success', 'Registrasi berhasil! Selamat datang.');
    }

    protected function registered(Request $request, $user)
    {
        // Anda bisa tambahkan logika setelah user berhasil register di sini
        // Misalnya, mengirim email verifikasi, dll.
        return null;
    }
}