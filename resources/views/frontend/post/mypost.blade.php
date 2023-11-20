@extends('frontend.layouts.main')

@section('container')
    <h1>Page My Posts</h1>

    <form id="filterForm">
        <div class="row">
            <div class="col">
                <input type="search" name="search" id="search" class="form-control" placeholder="search this...">
            </div>
          </div>
    </form>

    <div id="filteredPosts" class="row mt-3">
        @foreach ($posts as $post)
        <div class="col-md-5">
            <div class="card">
                <img src="{{ asset('backend/asset/img/no-image-available.png') }}" class="card-img-top" height="30" alt="...">
                <div class="card-body">
                    <h2 class="p-1">{{  Str::limit($post->title, 30, '...') }}</h2>
                    <div class="p-1">
                        <p class="m-0">Author: {{ $post->author->name }}</p>
                        <p>Published Date: {{ $post->published_date }}</p>
                    </div>
                    <p class="p-1">{{ Str::of($post->content)->words(40) }}</p>
        
                    <div class="p-1">
                        Likes: {{ $post->likes_count }}
                        Dislikes: {{ $post->dislikes_count }}
                    </div>
        
                    <div class="p-1">
                        Comments:
                        @foreach ($post->comments as $comment)
                            <div>
                                {{ Str::of($comment->content)->words(10) }}
                                Likes: {{ $comment->likes_count }}
                                Dislikes: {{ $comment->dislikes_count }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <hr>
        </div>
        @endforeach
        
        <div class="d-felx justify-content-center">
    
            {{ $posts->links('pagination::bootstrap-5') }}
    
        </div>
    </div>

    <div id="noResults" style="display: none;">
        <p>No posts found for the selected criteria.</p>
    </div>

    @endsection


    @push('post-search')

        <script>
        // Add an event listener for the search input
        $('#search').on('input', function() {
            filterPosts();
        });

        function filterPosts() {
            var search = $('#search').val();

            $.ajax({
                url: '{{ route("smypost") }}',
                type: 'GET',
                data: { search: search },
                success: function(response) {
                    if (response.posts.length > 0) {
                            displayFilteredPosts(response.posts);
                            $('#noResults').hide();
                        } else {
                            $('#filteredPosts').html('');
                            $('#noResults').show();
                        }
                    },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        
            function displayFilteredPosts(posts) {
                $('#filteredPosts').html('');
        
                // Display filtered posts
                posts.forEach(function(post) {
                    // $('#filteredPosts').append('<p>' + post.title + '</p>');
                    var limitedTitle = truncateWords(post.title, 15); // Adjust the word limit as needed

                    // Display author name
                    // var authorName = post.author ? post.author.name : 'Unknown Author';

                    // Limit content to two lines of words before filtering
                    var truncatedContent = truncateWords(post.content, 20);

                    $('#filteredPosts').append(`
                    <div class="col-md-5">
                        <div class="card">
                            <img src="{{ asset('backend/asset/img/no-image-available.png') }}" class="card-img-top" height="30" alt="...">
                            <div class="card-body">
                                <h2 class="p-1">` + limitedTitle + `</h2>
                                <div class="p-1">
                                    <p class="m-0">Author: ` + post.author_name + `</p>
                                    <p>Published Date: ` + post.date + `</p>
                                </div>
                                <p class="p-1">` + truncatedContent + `</p>                    
                                
                            </div>
                        </div>
                        <hr>
                    </div>
                    `);
                });
            }

            function truncateWords(str, numWords) {
                var words = str.split(' ');
                if (words.length > numWords) {
                    return words.slice(0, numWords).join(' ') + '...';
                } else {
                    return str;
                }
            }

        </script>
        
    @endpush
