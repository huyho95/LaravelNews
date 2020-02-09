<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\User;
use App\NguoiDung;

class UserController extends Controller
{
    public function getDanhSach()
    {
        $user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getThem()
    {
       return view('admin.user.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Name' => 'required|min:3',
            'Email' => 'required|email|unique:Users,email',// Bảng Users
            'Password' => 'required|min:3|max:32',
            'PasswordAgain' => 'required|same:Password',
        ],[
            'Name.required' => 'You have not entered user name yet !!!',
            'Name.min' => 'The length of user name must be at least 3 characters !!!',
            'Email.required' => 'You have not entered email yet !!!',
            'Email.email' => 'You have not entered email format properly yet !!!',
            'Email.unique' => 'Email have already existed',
            'Password.required' => 'You have not entered password yet !!!',
            'Password.min' => 'The length of password must be from 3 to 32 characters !!!',
            'Password.max' => 'The length of password must be from 3 to 32 characters !!!',
            'PasswordAgain.required' => 'You have not entered password again yet !!!',
            'PasswordAgain.same' => 'The password entered again is incorrect !!!',    
        ]);

        $user = new User;
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->password = bcrypt($request->Password);
        $user->quyen = $request->Position;
        $user->save();

        return redirect('admin/user/them')->with('notification','Add Successfully !!!');


    }

    public function getSua($id)
    {
        $user = User::find($id);
        return view('admin.user.sua',['user'=>$user]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'Name' => 'required|min:3',
        ],[
            'Name.required' => 'You have not entered user name yet !!!',
            'Name.min' => 'The length of user name must be at least 3 characters !!!',
        ]);

        $user = User::find($id);
        $user->name = $request->Name;
        $user->quyen = $request->Position;

        if($request->changePassword == "on")
        {
                $this->validate($request,
                    [
                        'Password' => 'required|min:3|max:32',
                        'PasswordAgain' => 'required|same:Password',
                    ],
                    [
                        'Password.required' => 'You have not entered password yet !!!',
                        'Password.min' => 'The length of password must be from 3 to 32 characters !!!',
                        'Password.max' => 'The length of password must be from 3 to 32 characters !!!',
                        'PasswordAgain.required' => 'You have not entered password again yet !!!',
                        'PasswordAgain.same' => 'The password entered again is incorrect !!!',    
                    ]);
                $user->password = bcrypt($request->Password);
        }
            
        $user->save();

        return redirect('admin/user/sua/'.$id)->with('notification','Edit Successfully !!!');
    }

    public function getXoa($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('admin/user/danhsach')->with('notification','Delete Successfully !!!');
    }

    public function getDangnhapAdmin()
    {
        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,
        [
            'email' => 'required',
            'password' => 'required|min:3|max:32',
        ],
        [
            'email.required' => 'You have not entered email yet !!!',
            'password.required' => 'You have not entered password yet !!!',
            'password.min' => 'The length of password must be from 3 to 32 characters !!!',
            'password.max' => 'The length of password must be from 3 to 32 characters !!!'
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email,'password' => $password]))

        // $data = ['email' => $email,'password' => $password];
        // if (Auth::attempt($data))

        {
            return redirect('admin/theloai/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('notification','Email or Password is incorrect. Please try again !!!');
        }   
    }

    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }

    public function getDetail($id)
    {
        $user = User::find($id);
        return view('admin.user.detail',['user'=>$user]);
    }

}