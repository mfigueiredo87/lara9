<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request){

        // $users = User::where('name','LIKE', "%{$request->search}%")->get();
        // outra forma
        $search = $request->search;
        $users = User::where(function ($query) use ($search) {
            // verificando
            if($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }

        })->get();
        //dd('$users');
        return view('users.index', compact('users'));
    }

    public function show($id){
        //verificando se o id existe
        if (!$user = User::find($id))
        return redirect()->route('users.index');
        // $user = User::where('id', $id)->first();
        return view('users.show', compact('user'));

    }

    public function create(){

        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request){
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);
        if ($user)
            return redirect()->route('users.index');

        return redirect()->route('users.create');
    }

    public function edit($id){
         //verificando se o id existe
         if (!$user = User::find($id))
         return redirect()->route('users.index');
         // $user = User::where('id', $id)->first();
         return view('users.edit', compact('user'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id){

        if (!$user = User::find($id))
         return redirect()->route('users.index');

        $data = $request->only('name', 'email');

        //actualizar apenas se o user pegar a nova senha
        if ($request->password)
            $data['password'] = bcrypt($request->password);

        $user->update($data);
        return redirect()->route('users.index');

        //  return view('users.edit', compact('user'));

    }

    public function destroy($id){
        //verificando se o id existe
        if (!$user = User::find($id))
        return redirect()->route('users.index');

        $user->delete();
        return redirect()->route('users.index');

    }

}
