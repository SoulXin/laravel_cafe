<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use App\Makanan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class MakananController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $makanans = Makanan::all();
        return view('makanan.index',compact("makanans"));
    }

    public function create(){
        $model = new Makanan();
        return view('makanan.form', compact('model'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama' => 'required|string|max:255|unique:makanan',
            'harga' => 'required|integer'
        ]);
        $model = Makanan::create($request->all());
        return redirect()->back()->with('success', 'your message,here');  
    }

    public function edit($id){
        $model = Makanan::findOrFail($id);
        return view('pages.berita.form', compact('model'));
    }

    public function show($id){
        $model = Makanan::findOrFail($id);
        return view('makanan.show', compact('model'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255|unique:makanan',
            'harga' => 'required|integer'
        ]);
        $model = Makanan::findOrFail($id);
        $model->update($request->all());
    }

    public function getAllMakananServerSide(){
        $model = Makanan::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_edit' => route('makanan.edit', $model->id),
                    'url_destroy' => route('makanan.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
