<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>All Posts</h2>
    <a href="<?= site_url('posts/create') ?>" class="btn btn-primary">New Post</a>
</div>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>

<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="card mb-3 p-3">
            <div class="card-body">
                <h3>
                    <a href="<?= site_url('posts/view/'.$post['PostID']) ?>">
                        <?= esc($post['Title']) ?>
                    </a>
                </h3>
                <p><small>By <?= esc($post['Username']) ?> on <?= esc($post['PublicationDate']) ?></small></p>
                <p><?= character_limiter(esc($post['Content']), 150) ?></p>
                <a href="<?= site_url('posts/view/'.$post['PostID']) ?>" class="btn btn-outline-primary btn-sm">View Post</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No posts found.</p>
<?php endif; ?>

<?= $this->endSection() ?>
