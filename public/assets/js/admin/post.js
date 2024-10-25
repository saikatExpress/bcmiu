$(document).ready(function () {
    $('.post-input').on('focus', function () {
        $(this).animate({ height: "100px" }, 200);
    }).on('blur', function () {
        if ($(this).val() === "") {
            $(this).animate({ height: "40px" }, 200);
        }
    });

    $('#photo-video-btn').on('click', function () {
        $('#file-input').click();
    });

    $('#check-in-btn').on('click', function () {
        $('#division-select').toggle();
        $('#division-select').focus();
    });

    $(document).on('click', function (event) {
        if (!$(event.target).closest('#check-in-btn').length && !$(event.target).closest('#division-select').length) {
            $('#division-select').hide();
        }
    });

    $('#post-form').on('submit', function (e) {
        e.preventDefault();
        
        let formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response && response.success === true){
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });

                    $('#post-form')[0].reset();
                    $('#division-select').hide();
                    $('.post-input').animate({ height: "40px" }, 200);
                    prependPost(response.post);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.content) {
                        $('.contentErr').text(errors.content[0]);
                    }
                    if (errors.media) {
                        $('.mediaErr').text(errors.media[0]);
                    }
                    if (errors.division_id) {
                        $('.divisionErr').text('Please select your check in');
                    }
                } else {
                    alert('An unexpected error occurred. Please try again.');
                }
            }
        });
    });

    $(document).on('input', '.user-comment-input', function() {
        let submitIcon = $(this).siblings('.submit-icon');
        
        if ($(this).val().trim() !== "") {
            submitIcon.show();
        } else {
            submitIcon.hide();
        }
    });

    function prependPost(post) {
        var feed = $('#feed');
        
        var postMedia = '';
        if (post.media) {
            postMedia = `<img src="${post.media}" alt="Post Media" class="post-image">`;
        }

        var newPost = `
            <div class="post">
                <div class="user-post-header">
                    <img style="width: 100%;" src="${post.user.profile_picture}" alt="Profile Picture" class="profile-pic">
                    <div class="user-infos">
                        <h4 class="username">${post.user.name}</h4>
                        <span class="timestamp">${post.created_at}</span>
                    </div>
                </div>
                <div class="post-content">
                    <p>${post.content}</p>
                    ${postMedia}
                </div>
                <div class="post-interactions">
                    <button class="like-button">👍 Like</button>
                    <button class="comment-button">💬 Comment</button>
                    <button class="share-button">🔗 Share</button>
                </div>
                <div class="comments-section">
                    <input type="text" class="comment-input" placeholder="Write a comment...">
                </div>
            </div>`;

        // Prepend the new post to the feed
        feed.prepend(newPost);
    }
});