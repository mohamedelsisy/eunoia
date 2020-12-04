<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(CommentRequest  $request){

        try {


            Comment::create([
                'product_id'   => $request->product_id,
                'user_id'       => $request->user_id,
                'content'       => $request->description,
            ]);

            alert()->success('تم بنجاح','تم إضافة التعليق  بنجاح');
            return redirect()->back();

        } catch (Exception $e) {
            alert()->error('خطأ ','يوجد خطأ ما');
            return redirect()->route('home');

        }

    }
}
