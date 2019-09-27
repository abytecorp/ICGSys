<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Caffeinated\Shinobi\Models\Role;
use App\User_type;
use App\User;
use App\Change;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $title = "Permisos de Usuarios";
        $users = User::orderBy('created_at','DESC')->paginate(6);
        return view('users.usrtbl', compact('title','users'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $title = 'Nuevo Usuario';
        $user_types = User_Type::pluck('user_type', 'id');
        return view('users.create', compact('title','user_types'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'id_user_type' => $request['user_type'],
            'password' => Hash::make($request['password']),
            'id_status' => 1,
        ]);
        Change::create([
            'description' => 'Creo al usuario:'.$request['name'].' '.$request['last_name'].' correctamente.',
            'id_user' => Auth::user()->id,
        ]);
        return redirect('/users');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        $roles = Role::get();
        $changes = Change::where('id_user', $user->id)->paginate(6);
        //dd($changes);
        $title = $user->name.' '.$user->last_name;
        return view('users.show', compact('user','title','roles','changes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {   
        $user_types = User_type::pluck('user_type', 'id');
        $roles = Role::get();
        return view('users.edit', compact('user', 'user_types', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        Change::create([
            'description' => 'Actualizo datos del usuario :'.$request['name'].' '.$request['last_name'].' correctamente.',
            'id_user' => Auth::user()->id,
        ]);

        return redirect()->route('users.index', $user->id)
            ->with('info', 'usuario actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function estadoUsuario(Request $request, $id, $st)
    {
        //dd($request);
        // return response()->json([
        //                 'id' => 1,
        //                 'msg' => 'se realizo con exito mijito',
        //                 'sts' => 2,
        //                 'sess_usr' => Auth::user()->name.' '.Auth::user()->last_name
        //             ]);

        // if($request->ajax()){
        //     if($st==1){$stat = 2;}else{$stat = 1;}
        //          $user = User::find($id);
        //          if($user->id_user_type != 1){
        //          $user->id_status = $stat;
        //          $user->save();
        //         $msg = 'Ahora el estado de '.$user->name.' '.$user->last_name.' es '.$user->status['status'];
        //     return response()->json([
        //             'id' => $user->id,
        //             'msg' => $msg,
        //             'sts' => $user->id_status,
        //             'sess_usr' => Auth::user()->name.' '.Auth::user()->last_name
        //         ]);
        //     }else{
        //         abort(500);
        //     }
        // }
    }
    public function getUsers()
    {
        $users = User::where('id_status',1)->get();
        return $users;
    }
}

