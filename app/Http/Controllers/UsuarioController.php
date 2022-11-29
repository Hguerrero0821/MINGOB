<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RolesUsuarios;
use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Roles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class Usuariocontroller extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create','store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios_submenus =DB::table('roles_usuarios as A')
        ->join('rol_menus as B','A.rol_id', '=', 'B.rol_id')
        ->select(
             'A.rol_id', 'B.submenu_id', 'A.user_id'
        )
        ->where('A.user_id','=', Auth::user()->id)
        ->get();
        // dd($usuarios_submenus);
        // $roles = Roles::has('RolesUsuarios')->get();
        // $usuarios = User::has('RolesUsuarios')->get();
        // $roles = Roles::all();
        // dd($users_rol);
        // $users_rol = RolesUsuarios::where('user_id','=',$usuarios->id)->get('rol_id');
        return view('userLogin.index', compact('usuarios_submenus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',


        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);


        return redirect()->route('usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $usuarios = User::has('RolesUsuarios')->get();
        // $roles = Roles::all();
        // $users_rol = RolesUsuarios::where('user_id','=',$usuarios->id)->get('rol_id');
        // return view('userLogin.index', compact('usuarios','roles','users_rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('usuarios.editar', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',

        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();


        return redirect()->route('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios');
    }
}
