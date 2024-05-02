<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Idealike;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class IdeaController extends Controller
{
    //

    public function post_ideas(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'upload_file' => 'required|mimes:jpeg,jpg,png|max:4000',
            'user_idea' => 'required'
        ]);

        if ($validated->fails()) {

            return response()->json([
                'status' => 400,
                'messages' => $validated->getMessageBag()
            ]);
        } else {

            $file_name = $request->file('upload_file')->getClientOriginalName();


            $request->upload_file->move(public_path('storage/ideas'), $file_name);
            $Data = [
                'file_name' => $file_name,
                'desc' => $request->user_idea,
                'user_id' => $request->user_id,
                'created_at' => Carbon::now()->diffForHumans()
            ];

            Idea::create($Data);

            # code...
            return response()->json([
                'status' => 200,
                'messages' => 'your idea has been uploaded'
            ]);
        }
    }


    public function fetch_idea(Request $request)
    {

        $get_ideas = DB::table('users')
            ->join('ideas', 'users.id', '=', 'ideas.user_id')
            ->select('users.*', 'ideas.*')->orderBy('desc', 'DESC')
            ->get();



        $output = '';
        if ($get_ideas->count() > 0) {
            foreach ($get_ideas as $idea) {


                $display = (($idea->file_name !== "") ? '{{ asset("/public/user_profile/User-avatar.png") }}' : '<span class="label label-danger">no Cleared</span>');


                $output .= '


            <div class="mt-3">

              <div class="card"  >
                  <div class="px-3 pt-4 pb-2">

                      <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center">
                          <img src="{{assets("/public/user_profile/avatar.png")}}">

                              <div>
                                  <h5 class="card-title  text-sm mb-0"><a href="#"> ' . $idea->name . '
                                      </a></h5>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="px-3 pt-4 pb-2">

                      <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center">
                          <img  class="shadow img-fluid"
                          src="storage/ideas/' . $idea->file_name . '" alt="Mario Avatar" style="width:100%">

                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <p class="fs-6 fw-light text-muted">
                      ' . $idea->desc . '

                      </p>
                      <div class="d-flex justify-content-between" >
                          <div>
                          <small class="float-right" >

                          <span class="like_count" id="refresh" >

                          ' .
                    $likes = DB::table('idealikes')->where('post_id', $idea->id)->get()->count()


                    .

                    '
                          </span>
                          <span title="Likes" data-post="' . $idea->id . '" id="SaveLike"
                              class="mr-2 btn btn-sm-outline-primary d-inline font-weight-bold">
                              <i class="bi bi-heart"></i>

                          </span>
                      </small>
                          </div>
                          <div>

                              <span title="Comment" data-post="' . $idea->id . '" name="' . $idea->user_id . '" id="Comment_idea" class="mr-2 btn btn-sm-outline-primary d-inline font-weight-bold" data-bs-toggle="modal" data-bs-target="#commentModel">
                              <i class="bi bi-chat-left"></i> leave a comment   </span>
                          </div>
                          <div>
                              <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                                2 days ago   </span>
                          </div>
                          <div>

                          <hr>


                      </div>
                          </div>
                      </div>

                  </div>
              </div>
          </div>


              ';
            }

            echo $output;
        }
    }
}
