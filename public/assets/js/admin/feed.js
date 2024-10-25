$(document).ready(function() {
    fetchPostsAndNotices();

    function fetchPostsAndNotices() {
        $.ajax({
            url: '/feed',
            method: 'GET',
            success: function(response) {
                $('#feed').empty();

                $.each(response, function(index, item) {
                    let commentsHtml = '';

                    $.each(item.comments, function(commentIndex, comment) {
                        commentsHtml += `
                            <div class="comment">
                                <div class="user-post-header">
                                    <img src="${comment.user.profile_picture}" alt="Profile Picture" class="profile-pic">
                                    <div class="user-infos">
                                        <h6 class="username">${comment.user.name}</h6>
                                        <span class="timestamp">${comment.created_at}</span>
                                    </div>
                                </div>
                                <div class="comment-text">
                                    ${comment.comment}
                                </div>
                            </div>
                        `;
                    });

                    $('#feed').append(`
                        <div class="post">
                            <div class="user-post-header">
                                <img src="${item.user.profile_picture}" alt="Profile Picture" class="profile-pic">
                                <div class="user-infos">
                                    <h4 class="username">${item.user.name}</h4>
                                    <span class="timestamp">${item.created_at}</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <p class="text-to-show">${item.content.substring(0, 100) + '...'}</p>
                                ${item.image ? `<img style="width: 100%;" src="/uploads/${item.image}" alt="Post Media" class="post-image">` : ''}
                            </div>
                            <div class="post-interactions">
                                <button class="like-button">👍 Like</button>
                                <button class="comment-button">💬 Comment</button>
                                <button class="share-button">🔗 Share</button>
                            </div>
                            <div class="comments-section comBox${item.id}">
                                ${commentsHtml}
                                <div class="input-wrapper">
                                    <input type="text" data-table="${item.tableName}" data-id=${item.id} class="user-comment-input" placeholder="Write a comment...">
                                    <button class="submit-icon submit-comment" style="display: none;">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `);
                });
            },
            error: function(error) {
                console.log("Error fetching data", error);
            }
        });
    }

    $(document).on('click', '.submit-comment', function() {
        const commentInput = $(this).siblings('.user-comment-input');
        const commentText  = commentInput.val();
        const postId       = commentInput.data('id');
        const tableName    = commentInput.data('table');

        if (commentText.trim() !== "") {
            $.ajax({
                url: '/comments/store',
                method: 'POST',
                data: {
                    comment: commentText,
                    post_id: postId,
                    table: tableName,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    appendComment(response.comment, postId);
                    commentInput.val('');
                },
                error: function(error) {
                    console.log("Error submitting comment", error);
                }
            });
        }
    });

    function appendComment(comment, postId) {
        const commentsSection = $(`.comBox${postId}`);
        commentsSection.append(`
            <div class="comment">
                <div class="user-post-header">
                    <img src="${comment.user.profile_picture}" alt="Profile Picture" class="profile-pic">
                    <div class="user-infos">
                        <h6 class="username">${comment.user.name}</h6>
                        <span class="timestamp">${comment.created_at}</span>
                    </div>
                </div>
                <div class="comment-text">
                    ${comment.text}
                </div>
            </div>
        `);
    }
});
