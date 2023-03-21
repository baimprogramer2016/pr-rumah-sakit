<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RoleMenu;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SettingRoleController extends Controller
{
    public function index(Request $request)
    {
        try {
            $datarole   = Role::where('role','!=','superadmin')->orderBy('id', 'ASC')->get();
            
            $maxroleid  = Role::first();
            $role       = $maxroleid->role;
            if($request->paramRole)
            {
                $role   = Dec($request->paramRole);
            }
            
            foreach($datarole as $item_role)
            {
                if($item_role->role == $role)
                {
                    $item_role->active = 'active';
                }
                else
                {
                    $item_role->active = '';
                }
            }

            $datamenu       = Menu::where('route_category','!=','superadmin')->get();
            $datarolemenu   = RoleMenu::where('role', $role)->get();
            foreach($datamenu as $item_menu)
            {
                $item_menu->selected =  CheckRoleMenuSelected($item_menu->route, $datarolemenu);

            }
            
            return view('pages.admin.setting-role', [
                "data_role" => $datarole,
                "data_menu" => $datamenu,
                "role" => $role
            ]);
        } catch (\Exception $e) {
            return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function add(Request $request)
    {
        return view('pages.admin.setting-role-add');
    }
    public function process(Request $request)
    {
        try {
            Role::create($request->all());
            return redirect()->route('setting-role-add')->with('message', "Data Berhasil di tambah")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $dateroleedit = Role::find(Dec($id));
            
            return view('pages.admin.setting-role-edit',[
                "data_role_edit" => $dateroleedit
            ]);

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $update = Role::find(Dec($id));
            $update->update($request->all());
            return redirect()->route('setting-role')->with('message', "Data Berhasil di update")->with('color-alert', "success");

        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }
    public function delete(Request $request)
    {
        try {
            $delete = Role::find(Dec($request->delete_menu));

            //check pada role_menu
            $check_data = User::where('user_role', $delete->role)->get()->count();
            if($check_data >0)
            {
                return redirect()->route('setting-role')->with('message', "Gagal dihapus, Role sudah digunakan pada User")->with('color-alert', "warning");    
            }


            //hapus juga di role menu
            DB::select(DB::RAW("DELETE FROM role_menu WHERE role ='".$delete->role."'"));

            //hapus di role
            $delete->delete();


            return redirect()->route('setting-role')->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");


        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    }

    public function rolemenu(Request $request , $id)
    {
        try {
            return view('pages.admin.setting-role-menu',[
                "id" => Dec($id)
            ]);
        } catch (\Exception $e) {
            return back()->with('message', $e->getMessage())->with('color-alert', "danger");
        }
    } 

    public function updaterolemenu(Request $request)
    {
        //hapus terlebih dahulu
        if($request->param_checked == 'yes')
        {
            
            DB::select(DB::RAW("DELETE FROM role_menu WHERE role ='".$request->param_role."' AND route ='".$request->param_route."'"));
            
            $payload = [
                "role"  =>  $request->param_role,
                "route" => $request->param_route
            ];
            

            RoleMenu::create($payload);
            return true;
        }
        else{
            
            DB::select(DB::RAW("DELETE FROM role_menu WHERE role ='".$request->param_role."' AND route ='".$request->param_route."'"));
            
            return true;
            
        } 
    }
}
