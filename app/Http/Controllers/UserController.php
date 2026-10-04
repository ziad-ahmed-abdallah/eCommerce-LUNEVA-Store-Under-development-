<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id' , 'asc')->paginate(15);
        return view('backend.users.index' , compact('users'));
    }


    public function doSearch(Request $request) 
    {
        $users = User::where('name' , 'LIKE' , '%' . $request->search . '%')->paginate(15);
    
        return view('backend.users.index' , compact('users'));
    }



    public function delete(int $id)
    {
        $user = User::findOrFail($id);
    
        if (in_array($user->role , ['admin' , 'superadmin'])){
            return back()->with('error' , 'Can Not Delete Admin or SuperAdmin Account');
        }
    
        $user->delete();
    
        return redirect()->route('admin.user.index')->with('success' , 'user has deleted Successfully');
    }


    public function forceDelete(int $id)
    {
        $user = User::withTrashed()->findOrFail($id)->forceDelete();
    
        return redirect()->route('admin.user.archive')->with('success' , 'User has Delete Successfully');
    }


    public function archive()
    {
        $users = User::onlyTrashed()->get();
    
        return view('backend.users.archive' , compact('users'));
    }



    public function restore(int $id)
    {
        User::withTrashed()->findOrFail($id)->restore();
    
        return redirect()->route('admin.user.archive')->with('success' , 'User has Restored Successfully');
    }

}
