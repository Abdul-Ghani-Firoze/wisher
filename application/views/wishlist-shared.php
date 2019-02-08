<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <title>Wishlist</title>
    </head>
    <body id="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">Wishlist</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <div id="username" class="nav-link">
                                <?php echo "Owner: " . $list['email']; ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container" id="wishlist">
                <div class="row" id="list">
                    <div class="col-sm-12" id="list-details">
                        <span id="list-name-holder"><?php echo $list['name'] ?></span>
                        <span id="divider"> - </span>
                        <span id="list-description-holder"><?php echo $list['description'] ?></span>                    
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
                                    </tr>
                                </thead>
                                <tbody id ="wishlist-items">
                                    <?php
                                    if ($items != null) {
                                        foreach ($items as $item) {
                                            ?>
                                            <tr>
                                                <td><?php echo $item['title'] ?></td>
                                                <td><?php echo $item['url'] ?></td>
                                                <td><?php echo $item['price'] ?></td>
                                                <td>
                                                    <?php
                                                    switch ($item['priority']) {
                                                        case 1:
                                                            echo "High";
                                                            break;
                                                        case 2:
                                                            echo "Medium";
                                                            break;
                                                        case 3:
                                                            echo "Low";
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr class='center'>"
                                        . "<td colspan='6' style='padding-top: 50px;'><span class='msg'>No items in the list</span>"
                                        . "</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
