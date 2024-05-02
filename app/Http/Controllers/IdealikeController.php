<?php

namespace App\Http\Controllers;

use App\Models\Idealike;
use Illuminate\Http\Request;

class IdealikeController extends Controller
{
    //
    public function likepostuser(Request $request){
        $post_id = $request->post_id;
        $user_id = $request->user_id;

        $like = Idealike::where('post_id','=',$post_id)->where('user_id','=',$user_id)->get();

        if (count($like) > 0) {
            $like[0]->delete();
            return response()->json([
                'sucess'=>true,
                'message' => 'unliked'
            ]);
        }

        $like = new Idealike;
        $like->user_id = $user_id;
        $like->post_id = $post_id;
        $like->save();

        return response()->json([
            'sucess'=>true,
            'message' => 'like added'
        ]);

    }
}
