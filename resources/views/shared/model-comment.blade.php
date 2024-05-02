<!-- Modal -->
<div class="modal fade" id="commentModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">User comment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="add_comment">
                    <span id="comment_message"></span>
                    <div class="CommentResult"></div>
                    @csrf
                    <input type="hidden" id="comment_post_id" name="comment_post_id">
                    {{-- <input type="hidden" id="comment_user_id" name="comment_user_id"> --}}
                    <div id="comment_box fixed-bottom">
                        <div class="mb-3">
                            <textarea class="form-control" rows="1" placeholder="comment" name="comment" id="comment"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-primary btn-sm" type="submit"> Post Comment </button>
                        </div>

                        <hr>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
