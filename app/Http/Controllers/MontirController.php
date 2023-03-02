<?php

namespace App\Http\Controllers;

use App\Models\Montir;
use Illuminate\Http\Request;

class MontirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.montir.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.montir.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'focus' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        Montir::create($request->all());
        return redirect()->route('montir.index')->with(['message' => 'Montir has been created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Montir  $Montir
     * @return \Illuminate\Http\Response
     */
    public function show(Montir $Montir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Montir  $Montir
     * @return \Illuminate\Http\Response
     */
    public function edit(Montir $montir)
    {
        $id = $montir->id;
        return view('pages.Montir.form', compact('montir', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Montir  $Montir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Montir $Montir)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'focus' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $Montir->update($request->all());
        return redirect()->route('montir.index')->with(['message' => 'Montir has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Montir  $Montir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Montir $Montir)
    {
        $Montir->delete();
        return redirect()->route('montir.index')->with(['message' => 'Montir has been deleted']);
    }

    public function json(Request $request)
    {
        $columns = array(
            0 =>'name',
            1 =>'gender',
            2 =>'focus',
            3 =>'phone',
            4 =>'email',
        );

        $totalFiltered = Montir::query();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        $montirs = Montir::query();
        if(!empty($request->input('search.value'))){
            $search = $request->input('search.value');
            $montirs = $montirs->where('name', 'like','%'.$search.'%');
            $totalFiltered = $totalFiltered->where('name', 'like','%'.$search.'%');

        }
        $montirs = $montirs->offset($start)->limit($limit)->orderBy($order,$dir)->latest()->get();

        $data = array();
        if(!empty($montirs)){
            foreach ($montirs as $key=>$montir){
            $edit =  route('montir.edit',$montir->id);
            $destroy =  route('montir.destroy',$montir->id);

            $nestedData['no'] = (str_split($start)[0]) * $limit + $key + 1;
            $nestedData['name'] = $montir->name;
            $nestedData['gender'] = $montir->gender;
            $nestedData['focus'] = $montir->focus;
            $nestedData['phone'] = $montir->phone;
            $nestedData['email'] = $montir->email;
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
            "recordsTotal"    => intval(Montir::count()),
            "recordsFiltered" => intval($totalFiltered->count()),
            "data"            => $data
        );

        return json_encode($json_data);
    }
}
