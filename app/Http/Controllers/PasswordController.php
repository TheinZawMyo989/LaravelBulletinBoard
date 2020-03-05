<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NewsServiceInterface;
use App\Rules\MatchOldPassword;
use Auth;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    private $newsService;
    /**
     * Constructor
     */
    public function __construct(NewsServiceInterface $newsService)
    {
        $this->middleware('auth');
        $this->newsService = $newsService;
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

        $change = $this->newsService->changePass($request);

        if ($change) {
            Auth::logout();
            return redirect('/login');
        }
    }
}
