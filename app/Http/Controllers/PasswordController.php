<?php

namespace App\Http\Controllers;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class PasswordController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * change password view
     *
     * @return void
     */
    public function changeView()
    {
        return view('change_password');
    }

    /**
     * change password
     *
     * @param Request $request
     * @return void
     */
    public function changePassword(Request $request)
    {
        $validator = $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'confirm_password' => ['required', 'same:new_password'],
        ]);
        if (!$validator) {
            return back()->withErrors($validator)->withInput();
        }
        $change = User::find(auth()->user()->id)
            ->update(['password' => Hash::make($request->new_password)]);

        if ($change) {
            Auth::logout();
            return redirect('/login');
        }
    }
}
