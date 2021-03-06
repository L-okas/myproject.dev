<?php

namespace App\Http\Controllers;
use App\Http\Requests\UsersEditRequest;
use App\Http\Requests\UsersRequest;
use App\Photo;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(8);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->only('photo_id');
          if($file = $request->file('photo_id')) {
              $name = time() . $file->getClientOriginalName();
              $file->move('images', $name);
              $photo = Photo::create(['path'=>$name]);
              $input['photo_id'] = $photo->id;
          }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->is_active = $request->is_active;
        $user->password = bcrypt($request->password);
        $user->photo_id = $input['photo_id'];
        $user->save();
        Session::flash('user_created', 'User Created');
        return redirect('/admin/users');
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();
        return view('admin.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        $user = User::findOrFail($id);


        if(trim($request->password) == ''){
            $forminputs = $request->except('password');
        } else {

            $forminputs = $request->all();
            $forminputs['password'] = bcrypt($request->password);
        }

        if($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['path'=>$name]);
            $forminputs['photo_id'] = $photo->id;
        }
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->role_id = $request->role_id;
//        $user->is_active = $request->is_active;
//        $user->photo_id = $photo->id;
        $user->update($forminputs);
        Session::flash('user_updated', 'User Updated');
        return redirect('/admin/users');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

//        unlink(public_path() . $user->photo->path); /*deletes images from images folder*/

        $user->delete();
        Session::flash('user_delete', 'User has been deleted');
        return redirect('/admin/users');
    }
}
                                                                                                                                                                                                                                