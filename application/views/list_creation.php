<?php $this->load->view('partials/header'); ?>
<body class="my-login-page content">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Welcome, let's create your wishlist!</h4>
                            <?php
                            echo form_open('user/list', array('class' => 'my-login-validation'), array('email' => $this->session->userdata('email')));
                            ?>
                            <div class="form-group">
                                <label for="wishlist-name">Wishlist name</label>
                                <input id="wishlist-name" type="text" class="form-control" name="wishlist-name" required>
                                <div class="invalid-feedback">
                                    Name is required
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description" type="text" class="form-control" name="description" required>
                                <div class="invalid-feedback">
                                    Description is required
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" id="create-btn" class="btn btn-primary btn-block">
                                    Create
                                </button>
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
