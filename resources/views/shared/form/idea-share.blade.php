<h4> Share yours ideas </h4>
<div class="alert alert-success alert-dismissible fade show" role="alert" id="idea_shared" style="display: none">

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<form action="" method="post" id="share_ideas" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="user_id" name="user_id" value={{ auth()->user()->id }}>
    <div class="row">
        <div class="mb-3">
            <textarea class="form-control" id="user_idea" name="user_idea" rows="3"></textarea>
            <input type="file" name="upload_file" id="upload_file" class="form-control rounded-0" width="30">
        </div>
        <div class="">
            <button class="btn btn-primary"> Share </button>
        </div>
    </div>
</form>
