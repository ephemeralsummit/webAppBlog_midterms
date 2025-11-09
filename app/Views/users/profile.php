<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-4 text-center">
        <img src="<?= esc($user['ProfilePicture'] ?: 'https://via.placeholder.com/150') ?>" 
             class="img-fluid rounded-circle mb-3" 
             style="width:150px;height:150px;object-fit:cover;">
        <h3><?= esc($user['Username']) ?></h3>
        <p class="text-muted"><?= esc($user['Email']) ?></p>
        <p><?= esc($user['Bio']) ?></p>
        <a href="<?= site_url('users/edit/' . $user['UserID']) ?>" class="btn btn-warning">Edit Profile</a>
        <?php if (session()->has('UserID')): ?>
            <a href="<?= site_url('logout') ?>" class="btn btn-outline-danger">Logout</a>
        <?php endif; ?>

    </div>

    <div class="col-md-8">
        <h4>Posts by <?= esc($user['Username']) ?></h4>
        <hr>
        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($post['Title']) ?></h5>
                        <p class="card-text"><?= esc($post['Content']) ?></p>
                        <p class="text-muted small">
                            Category: <?= esc($post['Category']) ?> |
                            Tags: <?= esc($post['Tags']) ?> |
                            Published: <?= esc($post['PublicationDate']) ?>
                        </p>
                        <a href="<?= site_url('posts/view/'.$post['PostID']) ?>" class="btn btn-outline-primary btn-sm">View Post</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No posts found for this user.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
