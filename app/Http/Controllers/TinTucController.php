<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;

class TinTucController extends Controller
{
    public function getDanhSach()
    {
       $tintuc = TinTuc::orderBy('id','DESC')->get();
       return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem()
    {   
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
        [
            'TypeNews' => 'required',
            'Title' => 'required|unique:TinTuc,TieuDe|min:3',// Bảng tin tức
            'Content' => 'required',
        ],[
            'TypeNews.required' => 'You have not entered name of type of news yet',
            'Title.required' => 'You have not entered Title name yet !!!',
            'Title.unique' => 'Name of title have already existed',
            'Title.min' => 'Name of Title must be at least 3 characters.',
            'Content.required' => 'You have not entered Content yet !!!',
            
        ]);

        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->Title;
        $tintuc->TieuDeKhongDau = changeTitle($request->Title);
        $tintuc->idLoaiTin = $request->TypeNews;
        $tintuc->TomTat = $request->Description;
        $tintuc->NoiDung = $request->Content;
        $tintuc->NoiBat = $request->Hot;
        $tintuc->SoLuotXem = 0;

        if($request->hasFile('Image'))
        {
            $file = $request->file('Image');

            $name = $file->getClientOriginalName();
            $duoi = $file->getClientOriginalExtension(); // lấy tên đuôi file
            if($duoi =! 'jpg' && $duoi =! 'jpeg' && $duoi =! 'png')
            {
                return redirect('admin/tintuc/them')->with('Error','You can only choose file ending with extension: jpg,jpeg,png !!!');
            }
            $Hinh = str_random(4)."_".$name; //str_random : chuỗi random kí tự
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh); //Lưu hình vào trong folder
            $tintuc->Hinh = $Hinh;
        }
        else
        {
            $tintuc->Hinh = "";
        }

        $tintuc->save();
        
        return redirect('admin/tintuc/them')->with('notification','Insert Successfully !!!');
    }

    public function getSua($id)
    {
        $tintuc = Tintuc::find($id);
        $loaitin = LoaiTin::all();
        $theloai = TheLoai::all();
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'loaitin'=>$loaitin,'theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id)
    {
        $this->validate($request,
        [
            'TypeNews' => 'required',
            'Title' => 'required|min:3',// Bảng tin tức
            'Description' => 'required',
            'Content' => 'required',
        ],[
            'TypeNews.required' => 'You have not entered name of type of news yet',
            'Title.required' => 'You have not entered Title name yet !!!',
            'Title.min' => 'Name of Title must be at least 3 characters.',
            'Description.required' => 'You have not entered Description yet !!!',
            'Content.required' => 'You have not entered Content yet !!!',
            
        ]);
        $tintuc = TinTuc::find($id);
        $tintuc->TieuDe = $request->Title;
        $tintuc->TieuDeKhongDau = changeTitle($request->Title);
        $tintuc->idLoaiTin = $request->TypeNews;
        $tintuc->TomTat = $request->Description;
        $tintuc->NoiDung = $request->Content;
        $tintuc->Noibat = $request->Hot;
         

        if($request->hasFile('Image'))
        {
            $file = $request->file('Image');
            $name = $file->getClientOriginalName();

            $duoi = $file->getClientOriginalExtension(); // lấy tên đuôi file
            if($duoi =! 'jpg' && $duoi =! 'jpeg' && $duoi =! 'png')
            {
                return redirect('admin/tintuc/them')->with('Error','You can only choose file ending with extension: jpg,jpeg,png !!!');
            }

            $Hinh = str_random(4)."_".$name; //str_random : chuỗi random kí tự
            while(file_exists("upload/tintuc/".$Hinh))
            {
                $Hinh = str_random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh); //Lưu hình vào trong folder
            unlink("upload/tintuc/".$tintuc->Hinh); // Xóa hình cũ đã tồn tại
            $tintuc->Hinh = $Hinh;
        }
    
        $tintuc->save();
        
        return redirect('admin/tintuc/sua/'.$id)->with('notification','Edit Successfully !!!');

    }

    public function getXoa($id)
    {
       $tintuc = TinTuc::find($id);
       $tintuc->delete();

       return redirect('admin/tintuc/danhsach')->with('notification','Delete Successfully !!!');
    }
}