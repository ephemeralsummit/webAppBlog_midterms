<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Add New User</h2>

<form action="<?= site_url('users') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="Username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="Email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="Password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="Bio" class="form-control" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Profile Picture (URL)</label>
        <input type="text" name="ProfilePicture" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="<?= site_url('users/post') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
