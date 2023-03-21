<?php

namespace App\Http\Controllers;

use App\Models\KategoriInput;
use App\Models\MasterInput1;
use App\Models\Menu;
use Illuminate\Http\Request;

class SettingKategoriController extends Controller
{
    public function index(Request $request)
    {
        $datakategori = KategoriInput::get();
        

        return view('pages.admin.setting-kategori-input',[
            "data_kategori_input" => $datakategori,
        ]);
    }

    public function add(Request $request)
    {
        $datamenuinput = Menu::where('route_parent', 'LIKE', '%input%')->get();

        return view('pages.admin.setting-kategori-input-add',[
            "data_menu_input" =>$datamenuinput
        ]);
    }

    public function process(Request $request)
    {
        try {
            KategoriInput::create($request->all());
            return redirect()->route('setting-kategori-input-add')->with('message', "Data Berhasil di tambah")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $datakategoriinput = KategoriInput::find(Dec($id));
            $datamenuinput = Menu::where('route_parent', 'LIKE', '%input%')->get();
            return view('pages.admin.setting-kategori-input-edit',[
                "data_kategori_input" => $datakategoriinput,
                "data_menu_input" =>$datamenuinput
            ]);

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $update = KategoriInput::find(Dec($id));
            $update->update($request->all());
            return redirect()->back()->with('message', "Data Berhasil di update")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function delete(Request $request)
    {   
        try {
            $delete = KategoriInput::find(Dec($request->delete_menu));

            //check pada role_menu
            $check_data = MasterInput1::where('kategori_input_id', $delete->id)->get()->count();
            if($check_data >0)
            {
                return redirect()->route('setting-kategori-input')->with('message', "Gagal dihapus, Role sudah digunakan pada User")->with('color-alert', "warning");    
            }

            //hapus di menu
            $delete->delete();
            return redirect()->route('setting-kategori-input')->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

}
