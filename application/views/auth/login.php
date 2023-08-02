<main>
    <form class="form-signin" action="" method="post">
        <img class="mb-4" src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <?php
        if ($this->session->flashdata('pesan')) {
            echo $this->session->flashdata('pesan');
        }
        ?>

        <small class="muted text-danger"><?= form_error('username'); ?></small>
        <small class="muted text-danger"><?= form_error('password'); ?></small>

        <div class="form-floating">
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus>
            <label for="username">Username</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Remember me
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–<?= date('Y'); ?></p>
    </form>
</main>