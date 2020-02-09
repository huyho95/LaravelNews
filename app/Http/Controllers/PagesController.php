<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\LoaiTin;
use App\TinTuc;
use App\Comment;
use App\User;

class PagesController extends Controller
{
    public function __construct() //Mặc định truyền biến theloai vào tất cả các trang chạy bằng PagesController
    {
        $theloai = TheLoai::all();
        $slide = Slide::all();
        view()->share('theloai',$theloai);
        view()->share('slide',$slide);
    }

    public function home()
    {
        return view('pages.home');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function typeOfnews($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.typeOfnews',['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }

    public function news($id,$idTinTuc)
    {
        $tintuc = TinTuc::find($id);
        $comment = Comment::where('idTinTuc',$tintuc->id)->orderBy('created_at','desc')->take(30)->paginate(5);
        $tinnoibat = TinTuc::where('NoiBat',1)->take(5)->get();
        $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(5)->get();
        return view('pages.news',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,'tinlienquan'=>$tinlienquan,'comment'=>$comment]);
    }

    public function getDangnhap()
    {
        return view('pages.login');
    }

    public function postDangnhap(Request $request)
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
        
        $data = ['email' => $email,'password' => $password];
        if (Auth::attempt($data))

        {
            return redirect('home');
        }
        else
        {
            return redirect('login')->with('notification','Email or Password is incorrect. Please try again !!!');
        }   
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect('home');
    }

    public function getUserDetail()
    {
        return view('pages.userDetail');
    }

    public function postUserDetail(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:3',
        ],[
            'name.required' => 'You have not entered user name yet !!!',
            'name.min' => 'The length of user name must be at least 3 characters !!!',
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if($request->checkpassword == "on")
        {
                $this->validate($request,
                    [
                        'password' => 'required|min:3|max:32',
                        'passwordAgain' => 'required|same:password',
                    ],
                    [
                        'password.required' => 'You have not entered password yet !!!',
                        'password.min' => 'The length of password must be from 3 to 32 characters !!!',
                        'password.max' => 'The length of password must be from 3 to 32 characters !!!',
                        'passwordAgain.required' => 'You have not entered password again yet !!!',
                        'passwordAgain.same' => 'The password entered again is incorrect !!!',    
                    ]);
                $user->password = bcrypt($request->password);
        }
            
        $user->save();

        return redirect('userDetail')->with('notification','Edit Successfully !!!');
    }

    public function getRegister()
    {
        return view('pages.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:Users,email',// Bảng Users
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
        ],[
            'name.required' => 'You have not entered user name yet !!!',
            'name.min' => 'The length of user name must be at least 3 characters !!!',
            'email.required' => 'You have not entered email yet !!!',
            'email.email' => 'You have not entered email format properly yet !!!',
            'email.unique' => 'Email have already existed',
            'password.required' => 'You have not entered password yet !!!',
            'password.min' => 'The length of password must be from 3 to 32 characters !!!',
            'password.max' => 'The length of password must be from 3 to 32 characters !!!',
            'passwordAgain.required' => 'You have not entered password again yet !!!',
            'passwordAgain.same' => 'The password entered again is incorrect !!!',    
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $user->save();

        return redirect('login')->with('notification','Register Successfully !!!');
    }

    public function getSearch(Request $request)
    {
        $key = $request->key;
        $news = TinTuc::where('TieuDe','like','%'.$key.'%')->orWhere('TomTat','like','%'.$key.'%')->take(5)->paginate(5);
        return view('pages.search',['key'=>$key,'news'=>$news]);

    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getVideo()
    {
        $theloai = Theloai::all();
        return view('welcome',['theloai'=>$theloai]);
    }
}