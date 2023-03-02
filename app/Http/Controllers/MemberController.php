<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\Utils;



class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('pages.member.form',compact('users'));
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
                'user_id'=>'required|unique:members,user_id',
                'nik'=>'required',
                "name"      => "required",
                "telp"     => "required",
                "address"     => "required",
                "gender"     => "required",
                "email"     => "required|email:dns|unique:members,email",
                "foto"      => ['required','image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
            ],
        );
        $foto = $request->file('foto');
        $filename = Utils::upload($foto);
        $request['images'] = $filename;

        $storeUser = Member::create(array_merge($request->except('foto'),['foto'=>$request->images]));
        return redirect()->route('member.index')->with(['message' => 'Member has been created']);

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
    public function edit(Member $member)
    {
        $id = $member->id;
        $users = User::all();
        return view('pages.member.form', compact('member', 'id','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $validatedData = $request->validate(
            [
                'user_id'=>'required|unique:members,user_id,'.$member->id,
                'nik'=>'required',
                "name"      => "required",
                "telp"     => "required",
                "address"     => "required",
                "gender"     => "required",
                "email"     => "required|email:dns|unique:members,email,".$member->id,
                "foto"      => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5048'],
            ],
        );

        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $filename = Utils::upload($foto);
            $request['images'] = $filename;
        }else{
            $request['images'] = $member->foto;
        }
        $member->update(array_merge($request->except('foto'),['foto'=>$request->images]));
        return redirect()->route('member.index')->with(['message' => 'Member has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('member.index')->with(['message' => 'Member has been deleted']);
    }

    public function status(Request $request)
    {
        Member::where('id',$request->id)->update([
            'is_active'=>$request->status
        ]);

        return 'success';
    }


    public function json(Request $request)
    {
        $columns = array(
            0 =>'nik',
            0 =>'name',
            1 =>'address',
            2=> 'telp',
            3=> 'gender',
            5=> 'foto',
            6=> 'email',
            7=> 'is_active',
        );

        $totalFiltered = Member::query();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $members = Member::query();
        $members = $members->with('user');
        if(!empty($request->input('search.value'))){
            $search = $request->input('search.value');
            $members = $members->where('name', 'like','%'.$search.'%');
            $totalFiltered = $totalFiltered->where('name', 'like','%'.$search.'%');

        }
        $members = $members->offset($start)->limit($limit)->orderBy($order,$dir)->latest()->get();

        $data = array();
        if(!empty($members)){
            foreach ($members as $key=>$member){
            $edit =  route('member.edit',$member->id);
            $destroy =  route('member.destroy',$member->id);
            $status = $member->is_active == 1 ? 'checked' : '';
            $src = Utils::url($member->foto);
            $nestedData['no'] = ($request->input('draw') -1) * $limit + $key + 1;
            $nestedData['name'] = $member->name;
            $nestedData['foto'] = "<img style='width: 200px' src='{$src}'
            class='img-thumbnail' alt='No Image'>";
            $nestedData['telp'] = $member->telp;
            $nestedData['gender'] = $member->gender;
            $nestedData['email'] = $member->email;
            $nestedData['nik'] = $member->nik;
            $nestedData['status'] = "<input type='checkbox' data-id='{$member->id}'
            data-status='{$member->is_active}'
            {$status} data-toggle='switchery' onload='new Switchery(this[0], this.attr('data')'
            data-color='#df3554' data-size='small' />";
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
            "recordsTotal"    => intval(Member::count()),
            "recordsFiltered" => intval($totalFiltered->count()),
            "data"            => $data
        );

        return json_encode($json_data);
    }
}
