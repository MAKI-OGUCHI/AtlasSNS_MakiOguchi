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

document.addEventListener('DOMContentLoaded', () => {
  const menu = document.getElementById('user-menu');
  const toggle = document.getElementById('user-toggle');

  if (!menu || !toggle) return;

  const open = () => {
    menu.classList.add('is-open');
    toggle.setAttribute('aria-expanded', 'true');
  };

  const close = () => {
    menu.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
  };

  toggle.addEventListener('click', (e) => {
    e.stopPropagation();
    menu.classList.contains('is-open') ? close() : open();
  });

  document.addEventListener('click', (e) => {
    if (!menu.contains(e.target)) close();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') close();
  });
});
