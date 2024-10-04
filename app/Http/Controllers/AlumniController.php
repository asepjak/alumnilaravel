<?php
namespace App\Http\Controllers;

use App\Models\AlumniUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class AlumniController extends Controller
{
    /**
     * Show the form for registering an alumni.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register-alumni'); // Use the form for alumni registration
    }

    /**
     * Handle the registration request for an alumni.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tanggal_lahir' => ['required', 'date'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:15'],
            'status' => ['required', 'string', 'max:50'],
        ]);

        // Create user account for alumni
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create alumni record
        AlumniUser::create([
            'id_user' => $user->id,
            'nama_alumni' => $request->name,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        // Fire the registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Redirect to dashboard
        return redirect()->route('dashboard')->with('success', 'Alumni registered successfully');
    }
}
