$(function () {
  $('.edit').on('click', function () {
    $('.Modal').fadeIn();
    var post = $(this).attr('post');
    var postId = $(this).attr('postID');
    $('.modal-post').val(post);
    $('.postID').val(postId);
    return false;
  });
});
