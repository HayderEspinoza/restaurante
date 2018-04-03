<?php

namespace App\Http\Controllers\Configuracion;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Restaurante\Configuracion\Role;
use Restaurante\Configuracion\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->paginate();
        return view('configuracion.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->get()->pluck('name', 'id');
        return view('configuracion.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new $this->user;
        $user->fill($request->all());
        $user->password = bcrypt('admin');
        $user->save();
        return redirect()->route('users.index')->with('status', 'Registro Exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user->findOrFail($id);
        $roles = $this->role->pluck('name', 'id');
        return view('configuracion.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);
        $user->fill($request->all());
        $user->save();
        return redirect()->route('users.index')->with('status', 'Se ha eliminado el usuario!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->findOrFail($id)->delete();
        return redirect()->route('users.index')->with('status', 'Se ha eliminado el usuario!');
    }
}
