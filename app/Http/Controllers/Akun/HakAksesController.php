<?php

namespace App\Http\Controllers\Akun;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DataTables;
use App\Makanan;
use App\Akses;

class HakAksesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('akun.akses');
    }

    public function edit($id){

        $model = User::where('id',$id)->first();
        $list_akses = Akses::all();
        return view('akun.edit', compact('model','list_akses'));
    }

    public function update(Request $request, User $user){
    
    }

    public function getAllUserServerSide(){
        $model = User::query();
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action_edit', [
                    'model' => $model,
                    'url_edit' => route('hak_akses.edit', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
