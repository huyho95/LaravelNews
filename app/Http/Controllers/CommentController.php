<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comment;
use App\TinTuc;

class CommentController extends Controller
{
    public function getXoa($id,$idTinTuc)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('notification','Delete comment Successfully !!!');
    }

    public function postComment($id,Request $request)
    {
        $idTinTuc = $id;
        $tintuc = TinTuc::find($id);
        $comment = new Comment;
        $comment->idTinTuc = $idTinTuc;
        $comment->idUser = Auth::user()->id;
        $comment->NoiDung = $request->content;
        $comment->save();

        return redirect("news/$id/".$tintuc->TieuDeKhongDau.".html")->with('notification','Comment Successfully !!!');

    }
}