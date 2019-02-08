<?php $this->load->view('partials/header'); ?>
<body>
    <div class="content">
        <div class="container" id="wishlist">
            <div class="row" id="list">
                <!--                <div class="col-sm-6" id="list-details">-->
                <div class="col-sm-8" id="list-details">
                    <span id="list-name-holder"></span>
                    <span id="divider"> - </span>
                    <span id="list-description-holder"></span>                    
                </div>
                <div class="col-sm-4 right" id="list-btn">
                    <a id="edit-list-btn" class="btn btn-primary"><i class="material-icons">&#xE147;</i> <span>Edit</span></a>
                    <button type="button" id="new-item" class="btn btn-success"><span>New item</span></button>
                    <a id="share-list-btn" class="btn btn-info"><i class="material-icons">&#xE80D;</i> <span>Share</span></a>
                </div>           
            </div>
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Priority</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id ="wishlist-items">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
$this->load->view('partials/footer');
