<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'User Management') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('/') ?>">Blog</a>
            <div>
                <a href="<?= site_url('users') ?>" class="btn btn-outline-light btn-sm">Users</a>
                <a href="<?= site_url('posts') ?>" class="btn btn-outline-light btn-sm">Posts</a>
                <?php if (session()->has('UserID')): ?>
                    <a href="<?= site_url('users/profile/'.session()->get('UserID')) ?>"class="btn btn-outline-light btn-sm">Profile</a>
                    <a href="<?= site_url('logout') ?>" class="btn btn-outline-danger btn-sm">Logout</a>
                <?php else: ?>
                    <a href="<?= site_url('login') ?>" class="btn btn-outline-primary btn-sm">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>
