
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div style="min-height: 70vh; display: flex">
        <form action="<?= site_url('register/post') ?>" method="post" class="m-auto shadow p-5" style="min-width: 400px">
            <h1 class="text-center mb-4">Register</h1>
            <?= csrf_field() ?>
            <input type="text" name="username" class="form-control" placeholder="Username" required><br>
            <input type="email" name="email" class="form-control" placeholder="Email" required><br>
            <input type="password" name="password" class="form-control" placeholder="Password" required><br>
            <button class="btn btn-primary w-100" style="border-radius: 5rem"type="submit">Register</button>
            <div class="text-center mt-4">
                <a href="<?= site_url('register') ?>" >Have an account? Log in.</a>
            </div>
            
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</html>