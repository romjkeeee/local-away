<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreUser;
use App\Http\Requests\AdminUpdateUser;
use App\Role;
use App\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\View\View;

class UserController extends Controller
{
    function __construct() {
        $this->middleware('role:admin|user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $data = User::query()->with('roles')->get();
        return view('admin.pages.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminStoreUser $request
     * @return RedirectResponse
     */
    public function store(AdminStoreUser $request)
    {
        if (User::query()->create($request->validated())->attachRole($request->role)) {
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('admin.pages.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $role = Role::all();
        return view('admin.pages.users.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUpdateUser $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(AdminUpdateUser $request,User $user)
    {
        if ($request->name){
            $user->name = $request->name;
        }
        if ($request->email){
            $user->email = $request->email;
        }
        if ($request->password){
            $user->password = bcrypt($request->password);
        }
        if ($request->role)
        {
            $user->detachRole($user->roles()->first());
            $user->attachRole($request->role);
        }
        $user->update();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return redirect()->route('users.index');
        }
    }

    public function adminProfile()
    {
        $user = auth()->user();
        return redirect()->route('users.show', $user->id);
    }
}
