@extends('layouts.app')
@section('content')


    @include('shared.model-comment')
    @include('shared.nav')
    {{-- <img src="{{ asset('user_profile/avatar.png')}}"> --}}

    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left-side-bar')
            </div>
            <div class="col-6">
                @include('shared.search-bar')
                @include('shared.form.idea-share')

                <hr>
                <div id="display_ideas"></div>

            </div>
            <div class="col-3">

                @include('shared.follow-box')
            </div>
        </div>
    </div>

    </body>

    </html>

@section('script')
    <script>
        fetch_idea()

        function fetch_idea() {

            $.ajax({
                url: "{{ route('fetch_idea') }}",
                method: 'get',
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    $("#display_ideas").html(response)

                }
            })
        }
        $("#share_ideas").on('submit', function() {
            event.preventDefault();
            $.ajax({
                url: "{{ route('post_ideas') }}",
                method: 'post',
                data: new FormData(this),
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {

                    if (response.status == 200) {
                        $("#idea_shared").show();
                        $("#idea_shared").html(response.messages);
                        fetch_idea();
                    }
                }

            })
        })





        saveLike();

        function saveLike() {
            $(document).on('click', '#SaveLike', function() {
                var post_id = $(this).data('post');
                var user_id = '{{ Auth::user()->id }}';


                $.ajax({
                    url: "{{ route('likepostuser') }}",
                    method: 'POST',
                    datatType: 'json',
                    data: {
                        post_id: post_id,
                        user_id: user_id,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    success: function(response) {

                        fetch_idea();
                    }
                });


                $.ajax({
                    url: "{{ route('fetch_like') }}",
                    method: "GET",
                    data: {
                        user_id: user_id,
                        post_id: post_id
                    },
                    success: function(response) {
                        $(".like_count").text(response);
                    }
                })

            })

        }

        fetchIdeaComment();

        function fetchIdeaComment() {
            $(document).on('click', '#Comment_idea', function(event) {
                var post_id = $(this).data('post');
                var user_idB = $(this).attr('name');




                //this is the variable that will be use to add commen
                $("#comment_post_id").val(post_id);
                $.ajax({
                    url: '{{ route('fetch_comment_idea') }}',
                    method: 'GET',
                    data: {
                        post_id: post_id,
                        user_idB: user_idB,
                        _token: "{{ csrf_token() }}"
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    success: function(response) {
                        $("#comment_message").html(response);

                    }
                })



            })

        }


        $(document).on('submit', '#add_comment', function(event) {
            event.preventDefault();
            var post_id = $("#comment_post_id").val();
            var user_id = '{{ Auth::user()->id }}';
            var comment = $("#comment").val();

            $.ajax({
                url: '{{ route('add_comment_idea') }}',
                method: 'POST',
                data: {
                    comment: comment,
                    user_id: user_id,
                    post_id: post_id,
                    _token: "{{ csrf_token() }}"
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    if (response.status == 200) {

                        // $("#comment_message").text(response.messages);
                        fetchIdeaComment();
                    }
                }
            })
        })


        // $(document).on('keyup', '#search', function(event) {
        //     event.preventDefault();
        //     var find_someone = $("#search").val();
        // })
    </script>
@endsection
