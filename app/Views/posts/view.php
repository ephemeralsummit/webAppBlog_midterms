<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card p-4 mb-3">
        <div class="card-body">
            <h2><?= esc($post['Title']) ?></h2>
        <p>
        <small>
            By 
            <a href="<?= site_url('users/profile/'.$post['UserID']) ?>">
                <?= esc($post['Username']) ?>
            </a>
            on <?= esc($post['PublicationDate']) ?>
        </small>
        </p>

        <div class="mt-3 mb-3">
            <?= esc($post['Content']) ?>
        </div>

        <p><strong>Category:</strong> <?= esc($post['Category']) ?></p>
        <p><strong>Tags:</strong> <?= esc($post['Tags']) ?></p>

        <hr>

        <?php if (session()->get('UserID') == $post['UserID']): ?>
            <a href="<?= site_url('posts/edit/'.$post['PostID']) ?>" class="btn btn-warning">Edit</a>
            <a href="<?= site_url('posts/delete/'.$post['PostID']) ?>" 
            onclick="return confirm('Are you sure you want to delete this post?')"
            class="btn btn-danger">Delete</a>
        <?php endif; ?>

        <a href="<?= site_url('posts') ?>" class="btn btn-secondary">Back to All Posts</a>
    </div>
</div>

<?= $this->endSection() ?>
