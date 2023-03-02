<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Utils;


class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                "name"      => "required",
                "email"     => "required|email:dns|unique:users,email",
                "password"     => "required|same:password_confirmation",
                "foto"           =>['required','image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
                "role" => "required",
            ],
        );

        $foto = $request->file('foto');
        $fileName = Utils::upload($foto);
        $validatedData['foto'] = $fileName;
        $validatedData['password'] = bcrypt($request->password);
        $storeUser = User::create($validatedData);
        return redirect()->route('user.index')->with(['message' => 'User has been created']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $id = $user->id;
        return view('pages.user.form', compact('user', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate(
            [
                "name"      => "required",
                "email"     => "required|email:dns|unique:users,email,".$user->id,
                "foto"           =>['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
                "role" => "required",
                "password_confirmation" => "same:password"
            ],
        );
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $filename = Utils::upload($foto);
            $request['images'] = $filename;
        }else{
            $request['images'] = $user->foto;
        }
        if ($request->get('password') == '') {
            $user->update(array_merge($request->except('password','images'),['foto'=>$request->images]));
        } else {
            $user->update(array_merge($request->except('images'),['foto'=>$request->images]));
        }
        return redirect()->route('user.index')->with(['message' => 'User has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with(['message' => 'User has been deleted']);
    }

    public function json(Request $request)
    {
        $columns = array(
            0 =>'name',
            1 =>'email',
            2=> 'role',
            3=> 'foto',
        );

        $totalFiltered = User::query();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $users = User::query();
        if(!empty($request->input('search.value'))){
            $search = $request->input('search.value');
            $users = $users->where('name', 'like','%'.$search.'%');
            $totalFiltered = $totalFiltered->where('name', 'like','%'.$search.'%');

        }
        $users = $users->offset($start)->limit($limit)->orderBy($order,$dir)->latest()->get();

        $data = array();
        if(!empty($users)){
            foreach ($users as $key=>$user){
            $edit =  route('user.edit',$user->id);
            $destroy =  route('user.destroy',$user->id);
            $src = Utils::url($user->foto);

            $nestedData['no'] = (str_split($start)[0]) * $limit + $key + 1;
            $nestedData['name'] = $user->name;
            $nestedData['email'] = $user->email;
            $nestedData['role'] = $user->role;
            $nestedData['foto'] = "<img style='width: 200px' src='{$src}'
            class='img-thumbnail' alt='No Image'>";
            $nestedData['options'] = "&emsp;<a href='{$edit}'
            class='text-primary'><i class='mdi mdi-lead-pencil'></i></a>
                                    &emsp;<a href='#' data-toggle='modal'
                                    data-target='#exampleModal' data-url='{$destroy}'
                                    class='text-danger'><i class='mdi mdi-trash-can-outline'></i></a>";
            $data[] = $nestedData;

            }
        }


        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval(User::count()),
            "recordsFiltered" => intval($totalFiltered->count()),
            "data"            => $data
        );

        return json_encode($json_data);
    }
}
