<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function add_comment_idea(Request $request)
    {
        $comment = $request->comment;
        $user_id = $request->user_id;
        $post_id = $request->post_id;

        $add_comment = new Comment();
        $add_comment->user_id = $user_id;
        $add_comment->post_id = $post_id;
        $add_comment->comment = $comment;

        $add_comment->save();


        if ($add_comment) {
            return response()->json([
                'status' => 200,
                'messages' => 'commented'
            ]);
        }
    }


    public function fetch_comment_idea(Request $request)
    {
        $post_id = $request->post_id;
        $user_idB = $request->user_idB;


        $get_comment = DB::table('comments')->where('post_id', $post_id)->get();


        $output = '';
        if ($get_comment->count() > 0) {
            foreach ($get_comment as $comment) {
                $output .= '

            <div class="col-12  d-flex shadow mb-2 ">
                <div class="shadow">
                     <div class="row">
                        <div class="col-md-4">
                        <span>levi mokili</span>
                         </div>
                         <div class="col-md-8">  <span>' . $comment->comment . '</span></div>

                     </div>

                </div>
            </div>





         ';
            }

            echo $output;
        } else {
            echo '<div> No comments</div>';
        }
    }
}
