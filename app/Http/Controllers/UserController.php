<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    /**
     * Constructor method
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['edit', 'update']]);
    }
    public function index()
    {

        // if (!Gate::allows('users')) {
        //     abort(403, "Halaman tidak dapat di Akses!");
        // }


        $users = User::all();
        return view('user.index', compact('users'));
    }
    /**
     * Show User Registration Form
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Register User
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        User::create([
            'name'      => $request->get('name'),
            'email'     => $request->get('email'),
            'password'  => bcrypt($request->get('password'))
        ]);

        return redirect()->back()->with('success', 'Data Berhasil tambah.');
    }

    /**
     * Show User Profile
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update User Profile
     *
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'confirmed'
        ]);

        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        if ($request->get('password') !== '') {
            $user->password = $request->get('password');
        }
        $user->save();

        return redirect('user')->with('success', 'Data Berhasil ubah.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user')->with('success', 'Data Berhasil Dihapus.');
    }
}
