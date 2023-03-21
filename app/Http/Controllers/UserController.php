<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index(Request $request)
  {
    try {
        
        $cari = (object)[
            'cari_id'    => $request->i,
            'cari_name'  => $request->u,
            'cari_role'  => $request->r,
        ];
        
        $query_user = User::where("user_id","!=","superadmin");

        if($cari->cari_id !='')
        {
            $query_user->where('user_id' ,'like' ,'%'.$cari->cari_id.'%');
        }
        if($cari->cari_name !='')
        {
            $query_user->where('user_name' ,'like' ,'%'.$cari->cari_name.'%');
        }
        
        if($cari->cari_role !='')
        {
            $query_user->where('user_role' ,'like' ,'%'.$cari->cari_role.'%');
        }
        
        $datauser =$query_user->get();

        

        $datarole = Role::where('role','!=','superadmin')->get();
        return view('pages.admin.setting-user',[
            "data_user" => $datauser,
            "data_role" => $datarole,
            "param_cari" => $cari
        ]);
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  public function add(Request $request)
  {
    try {
        $datarole = Role::get();
        return view('pages.admin.setting-user-add',[
            "data_role" => $datarole,
        ]);
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  public function process(Request $request)
  {
    try {
        $payload  = [
            "user_id" => $request->user_id,
            "user_name" => $request->user_name,
            "user_role" => $request->user_role,
            "user_email" => $request->user_email,
            "password" => Hash::make($request->password),
        ];

        User::create($payload);
        return redirect()->back()->with('message', "Data Berhasil di tambah")->with('color-alert', "success");
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  public function edit(Request $request, $id)
  {
    try {
        $datauser = User::find(Dec($id));
        $datarole = Role::get();
        return view('pages.admin.setting-user-edit',[
            "data_user" => $datauser,
            "data_role" => $datarole,
        ]);
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  public function update(Request $request, $id)
  {
      try {

        $update = User::find(Dec($id));
        if (Hash::check($request->password, $update->password)) {
            $password  = $update->password;
        }else{
            $password  =  Hash::make($request->password);
        }

        $payload  = [
            "user_id" => $request->user_id,
            "user_name" => $request->user_name,
            "user_role" => $request->user_role,
            "user_email" => $request->user_email,
            "password" => $password,
        ];
          
          $update->update($payload);
          return redirect()->back()->with('message', "Data Berhasil di update")->with('color-alert', "success");

      } catch (\Exception $e) {
          return back()->with('message', $e->getMessage())->with('color-alert', "danger");
      }
  }

  
  public function ubahpassword(Request $request, $id)
  {
    try {
        $datauser = User::find(Dec($id));
        return view('pages.admin.setting-user-password',[
            "data_user" => $datauser,
        ]);
    } catch (\Exception $e) {
        return redirect()->route('error')->with('message', $e->getMessage())->with('color-alert', "danger");
    }
  }

  public function updatepassword(Request $request, $id)
  {
      try {

        $update = User::find(Dec($id));
        if (Hash::check($request->password, $update->password)) {
            $password  = $update->password;
        }else{
            $password  =  Hash::make($request->password);
        }

        $payload  = [
            "user_id" => $update->user_id,
            "user_name" => $update->user_name,
            "user_role" => $update->user_role,
            "user_email" => $update->user_email,
            "password" => $password,
        ];
          
          $update->update($payload);
          return redirect()->back()->with('message', "Password Berhasil di update")->with('color-alert', "success");

      } catch (\Exception $e) {
          return back()->with('message', $e->getMessage())->with('color-alert', "danger");
      }
  }

  public function delete(Request $request)
  {
      try {
          $delete = User::find(Dec($request->delete_menu));
          $delete->delete();
          return redirect()->route('setting-user')->with('message', "Data Berhasil di Hapus")->with('color-alert', "success");

      } catch (\Exception $e) {
          return back()->with('message', $e->getMessage())->with('color-alert', "danger");
      }
  }

}

// Hash::check('plain-text', $hashedPassword)
