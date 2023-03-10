<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Food::all();
        $gambar = Food::get();
        return view('admin.food', compact('foods'));
    }

    public function api()
    {
        $foods = Food::all();
        
        // yajra data table
        $datatables = datatables()->of($foods)
                            ->addColumn('date', function($food) {
                                return convert_date($foods->created_at);
                            })
                            ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required',
        ]);

        Food::create($request->all());

        return redirect('foods');

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
 
        $nama_file = time()."_".$file->getClientOriginalName();
 
                // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
 
        Gambar::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);
 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        $this->validate($request,[
            'name' => ['required'],
            'price' => ['required'],
        ]);

        $food->update($request->all());

        return redirect('foods');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();
    }
}
