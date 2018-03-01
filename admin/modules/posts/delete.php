<?php ob_start(); ?>

<?php require_once($_SERVER["DOCUMENT_ROOT"] . '/admin/includes/init.php'); ?>

<?php
if (!$session->is_signed_in()) {
    $flash->set_message('danger', 'Sorry! You are not logged in.');
    redirect('/admin/login.php');
} else {
    if (empty($_GET['id'])) {
        $flash->set_message('danger', 'This post not found in our database.');
        redirect('/admin/modules/posts');
    }

    $post = Post::find_post_by_id($_GET['id']);

    if ($post) {
        $post->delete();
        $flash->set_message('success', $post->title . '\'s has been removed from our database.');
        redirect('/admin/modules/posts');
    } else {
        $flash->set_message('danger', 'This post not found in our database.');
        redirect('/admin/modules/posts');
    }
}
?>