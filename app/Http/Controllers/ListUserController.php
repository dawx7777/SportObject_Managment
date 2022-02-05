<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ListUserController extends Controller{

   
    function listuser(){

        $listusers=User::all()
        ->where('role','2');
        return view ('dashboards.admins.listusers',compact('listusers'));
    }

    public function usersdestroy($id){

        $userdestroy=User::find($id);
        $userdestroy->delete();
    
        Alert::success('Success', 'Poprawnie usunełeś użytkownika');
        return redirect()->back();
        }
}