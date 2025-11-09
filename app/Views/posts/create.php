<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h2>Create New Post</h2>

<form action="<?= site_url('posts/store') ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="Title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="Content" class="form-control" rows="5" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <input type="text" name="Category" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Tags (comma-separated)</label>
        <input type="text" name="Tags" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Publish</button>
    <a href="<?= site_url('posts') ?>" class="btn btn-secondary">Cancel</a>
</form>

<?= $this->endSection() ?>
