<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\RoleMenu;
use Illuminate\Support\Facades\DB;

class SettingMenuController extends Controller
{
    public function index(Request $request)
    {
        try {
            $datamenu = Menu::orderBy('id', 'ASC')->get();
            return view('pages.admin.setting-menu', [
                "data_menu" => $datamenu
            ]);
        } catch (\Exception $e) {
            return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
    public function add(Request $request)
    {
        return view('pages.admin.setting-menu-add');
    }
    public function process(Request $request)
    {
        try {
            Menu::create($request->all());
            return redirect()->route('setting-menu-add')->with('message', "Data Berhasil di tambah")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    
    public function edit(Request $request, $id)
    {
        try {
            $datemenuedit = Menu::find(Dec($id));
            
            return view('pages.admin.setting-menu-edit',[
                "data_menu_edit" => $datemenuedit
            ]);

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $update = Menu::find(Dec($id));
            $update->update($request->all());
            return redirect()->route('setting-menu')->with('message', "Data Berhasil di update")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
    public function delete(Request $request)
    {   
        try {


            $delete = Menu::find(Dec($request->delete_menu));
            
            //check pada role_menu
            $check_data = RoleMenu::where('route', $delete->route)->get()->count();
            if($check_data >0)
            {
                return redirect()->route('setting-menu')->with('message', "Gagal dihapus, Menu sudah tersetting pada Role")->with('color-alert', "warning");    
            }

            //hapus di menu
            $delete->delete();
            return redirect()->route('setting-menu')->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function settingmaster(Request $request)
    {
        try {
            $datamenusubadmin = Menu::where('route_category','subadmin')->get();
            
            return view('pages.admin.setting-master', [
                "data_sub_menu" => $datamenusubadmin
            ]);
        } catch (\Exception $e) {
            return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
}