<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    public function getDanhSach()
    {
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach',['theloai'=>$theloai]);
    }

    public function getThem()
    {
        return view('admin.theloai.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'txtCateName' => 'required|unique:theloai,Ten|min:3|max:100'
            ],
            [
                'txtCateName.unique' => 'Category name have already existed',
                'txtCateName.required' => 'You have not entered a category name yet',
                'txtCateName.min' => 'The length of the category name must be from 3 to 100 characters',
                'txtCateName.max' => 'The length of the category name must be from 3 to 100 characters',
            ]);

        $theloai = new TheLoai;
        $theloai->Ten = $request->txtCateName;
        $theloai->TenKhongDau = changeTitle($request->txtCateName); 
        $theloai->save();

        return redirect('admin/theloai/them')->with('notification','Insert Successfully !!!');
    }

    public function getSua($id)
    {
        $theloai = TheLoai::find($id);
        return view('admin.theloai.sua',['theloai' => $theloai]);
    }

    public function postSua(Request $request,$id)
    {
        $theloai = TheLoai::find($id);       
        $this->validate($request,
            [
                'txtCateName' => 'required|unique:theloai,Ten|min:3|max:100'
            ],
            [
                'txtCateName.unique' => 'Category name have already existed',
                'txtCateName.required' => 'You have not entered a category name yet',
                'txtCateName.min' => 'The length of the category name must be from 3 to 100 characters',
                'txtCateName.max' => 'The length of the category name must be from 3 to 100 characters',
            ]);

        $theloai->Ten = $request->txtCateName;
        $theloai->TenKhongDau = changeTitle($request->txtCateName);
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('notification','Edit Succesfully !!!');
    }

    public function getXoa($id)
    {
        $theloai = TheLoai::find($id);
        $theloai->delete();

        return redirect('admin/theloai/danhsach')->with('notification','Delete Successfully !!!');
    }
}
