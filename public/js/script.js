$(function () {
  $('.edit').on('click', function () {
    $('.modal').fadeIn();
    var post = $(this).attr('post');
    var postId = $(this).data('post-id');
    $('.modal_post').val(post);
    $('.post_ID').val(postId);
    return false;
  });
});

document.addEventListener('DOMContentLoaded', () => {
  const menu = document.getElementById('userMenu');
  const toggle = document.getElementById('userToggle');

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

$(function () {
  // 開く
  $('.edit').on('click', function () {
    $('.modal').fadeIn();

    var post = $(this).attr('post');
    var postId = $(this).attr('post_ID');

    $('.modal_post').val(post);
    $('.post_ID').val(postId);

    return false;
  });

  // 背景クリックで閉じる
  $('.modal_close').on('click', function () {
    $('.modal').fadeOut();
  });

  // Escで閉じる
  $(document).on('keydown', function (e) {
    if (e.key === 'Escape') $('.modal').fadeOut();
  });
});
