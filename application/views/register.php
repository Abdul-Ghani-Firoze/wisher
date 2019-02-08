<?php $this->load->view('partials/header'); ?>
<body class="my-login-page content">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register</h4>
                            <div class="error">
                                <?php
                                if (isset($error_message)) {
                                    echo $error_message;
                                }
                                ?>
                            </div>
                            <?php echo form_open('user/register', array('class' => 'my-login-validation')); ?>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" required>
                                <div class="invalid-feedback">
                                    Name is required
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                                <div class="invalid-feedback">
                                    Your email is invalid
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required data-eye>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input id="confirm-password" type="password" class="form-control" name="confirm-password" required data-eye>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" id="register-btn" class="btn btn-primary btn-block">
                                    Register
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Already have an account? <a href="<?php echo site_url('user/login'); ?>">Login</a>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
$this->load->view('partials/footer');
