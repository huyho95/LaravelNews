<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

class SlideController extends Controller
{
    public function getDanhSach()
    {
        $slide = Slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }

    public function getThem()
    {
        return view('admin.slide.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'Name' => 'required',
            'Content' => 'required',
        ],
        [
            'Name.required' => 'You have not entered name of slide yet',
            'Content.required' => 'You have not entered content of slide yet'
        ]);

        $slide = new Slide;
        $slide->Ten = $request->Name;
        $slide->NoiDung = $request->Content;
        if($request->has('Link'))
            $slide->link = $request->Link;
        
        if($request->hasFile('Image'))
            {
                $file = $request->file('Image');
    
                $name = $file->getClientOriginalName();
                $duoi = $file->getClientOriginalExtension(); // lấy tên đuôi file
                if($duoi =! 'jpg' && $duoi =! 'jpeg' && $duoi =! 'png')
                {
                    return redirect('admin/slide/them')->with('Error','You can only choose file ending with extension: jpg,jpeg,png !!!');
                }
                $Hinh = str_random(4)."_".$name; //str_random : chuỗi random kí tự
                while(file_exists("upload/slide/".$Hinh))
                {
                    $Hinh = str_random(4)."_".$name;
                }
                $file->move("upload/slide",$Hinh); //Lưu hình vào trong folder
                $slide->Hinh = $Hinh;
            }
            else
            {
                $slide->Hinh = "";
            }

            $slide->save();

            return redirect('admin/slide/them')->with('notification','Insert Successfully !!!');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.sua',['slide' => $slide]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'Name' => 'required',
            'Content' => 'required',
        ],
        [
            'Name.required' => 'You have not entered name of slide yet',
            'Content.required' => 'You have not entered content of slide yet'
        ]);

        $slide = Slide::find($id);
        $slide->Ten = $request->Name;
        $slide->NoiDung = $request->Content;
        if($request->has('Link'))
            $slide->link = $request->Link;
        
        if($request->hasFile('Image'))
            {
                $file = $request->file('Image');
    
                $name = $file->getClientOriginalName();
                $duoi = $file->getClientOriginalExtension(); // lấy tên đuôi file
                if($duoi =! 'jpg' && $duoi =! 'jpeg' && $duoi =! 'png')
                {
                    return redirect('admin/slide/them')->with('Error','You can only choose file ending with extension: jpg,jpeg,png !!!');
                }
                $Hinh = str_random(4)."_".$name; //str_random : chuỗi random kí tự
                while(file_exists("upload/slide/".$Hinh))
                {
                    $Hinh = str_random(4)."_".$name;
                }
                unlink("upload/slide/".$slide->Hinh);
                $file->move("upload/slide",$Hinh); //Lưu hình vào trong folder
                $slide->Hinh = $Hinh;
            }

            $slide->save();

            return redirect('admin/slide/sua/'.$id)->with('notification','Insert Successfully !!!');
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        $slide->delete();

        return redirect('admin/slide/danhsach')->with('notification','Edit Successfully !!!');
    }
}