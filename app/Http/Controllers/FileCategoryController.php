<?php

namespace App\Http\Controllers;

use App\Models\AdditionalFile;
use App\Models\FileCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileCategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jenis File',
            'file_categories' => FileCategory::all(),
        ];
        return view('admin.file_categories.index', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
        ]);

        $file_categories = new FileCategory();
        $file_categories->category = $request->category;
        $file_categories->is_required = $request->is_required;

        $file_categories->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil menambahkan data',
            ],
        );
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'category' => 'required',
        ]);

        $file_categories = FileCategory::find($id);
        $file_categories->category = $request->category;
        $file_categories->is_required = $request->is_required;


        $file_categories->save();

        return redirect()->back()->with(
            [
                'success' => 'Berhasil memperbaharui data',
            ],
        );
    }

    public function destroy($id)
    {
        $file_categories = FileCategory::find($id);
        $additional_file = AdditionalFile::where('id_file_category', $id)->get();
        foreach ($additional_file as $item) {
            Storage::delete($item->file);
            $item->delete();
        }
        if ($file_categories->delete()) {
            return redirect()->back()->with(
                [
                    'success' => 'Berhasil menghapus data',
                ]
            );
        } else {
            return redirect()->back()->with(
                [
                    'danger' => 'Gagal menghapus data',
                ]
            );
        }
    }
}
