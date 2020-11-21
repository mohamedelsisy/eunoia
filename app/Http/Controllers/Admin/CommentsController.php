<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(){
        $comments = Comment::with(['user:id,name', 'product:id,title'])->get();
        return view('admin.comments.index', compact('comments'));
    }
    public function edit($id)
    {
        //
        try {
            $comment = Comment::with(['user:id,name','product:id,title'])->find($id);
            if (!$comment) {
                return redirect()->route('admin.comments')->with(['error' => 'هذا التعليق غير موجود   ']);
            }


            return view('admin.comments.edit', compact('comment'));

        } catch (Exception $exception) {

            return redirect()->route('admin.comments')->with(['error' => 'هناك خطأ ما']);

        }

    }


    public function update(CommentRequest $request)
    {
        try {

            $comment = Comment::find($request->id);
            if (!$comment) {
                return redirect()->route('admin.comments')->with(['error' => 'هذا التعليق غير موجود']);
            }


            Comment::where('id', $request->id)->update([
                'product_id'    => $request->product_id,
                'user_id'       => $request->user_id,
                'status'        => $request->status,
                'content'       => $request->description,
            ]);
            return redirect()->route('admin.comments')->with(['success' => 'تم تحديث البيانات بنجاح']);

        } catch (Exception $exception) {
            return redirect()->route('admin.comments')->with(['error' => 'يوجد خطأ ما ']);

        }
    }


    public function destroy($id)
    {
        // delete
        try {
            $comment = Comment::find($id);
            if (!$comment) {
                return redirect()->route('admin.comments', $id)->with(['error' => 'هذا التعليق غير موجود']);
            }

            $comment->delete();

            return redirect()->route('admin.comments')->with(['success' => 'تم حذف المنتج بنجاح']);

        } catch (Exception $e) {
            return redirect()->route('admin.comments')->with(['error' => 'هناك خطأ ما ']);

        }
    }
}
