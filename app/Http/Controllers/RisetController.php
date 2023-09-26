<?php

namespace App\Http\Controllers;

use App\Models\Riset;
use Illuminate\Http\Request;

class RisetController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Bidang Riset',
            'riset' => Riset::all(),
        ];
        return view('admin.riset.index', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'riset' => 'required',
        ]);

        $riset = new Riset();
        $riset->riset = $request->riset;

        $riset->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menambahkan data',
            ],
        );
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'riset' => 'required',
        ]);

        $riset = Riset::find($id);
        $riset->riset = $request->riset;


        $riset->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui data',
            ],
        );
    }

    public function destroy($id)
    {
        $riset = Riset::find($id);
        $riset->delete();
        return redirect()->back()->with(
            [
                'success' => 'Berhasil menghapus data',
            ]
        );
    }
}
