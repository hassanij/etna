<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <?php require_once('../../../../wp-load.php') ?>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Shop </a>
            </div>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

<!--             <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div> -->
            <?php 
            $modal = "";
            $id = get_current_user_id();
            if (Achiev::getpoint($id) < 40)
                $modal = "modal";
            ?>
            <div class="col-md-9">

                <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Beginner_0.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 1</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Beginner_1.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Beginner_2.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Beginner_3.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Beginner_4.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Beginner_5.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Rookie_0.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Rookie_1.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Rookie_2.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Rookie_3.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Rookie_4.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="img/Grade_Rookie_5.png" alt="">
                            <div class="caption">
                                <h4 class="pull-right">40 <?php $label = get_option('achiev-point_label', 'points'); echo $label; ?></h4>
                                <h4>Badge 2</a>
                                </h4>
                                <button type="button" id="acheter" data-toggle=<?php echo $modal; ?> data-target="#myModal">
                                    Acheter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Erreur</h4>
                            </div>
                            <div class="modal-body">
                            Pas assez de coinouzes.
                            </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <div id="test">
                <?php 
                $id = get_current_user_id();
                $username = wp_get_current_user(); 
                $username = $username->user_login;
                $points = Achiev::getpoint($id);
                $label = get_option('achiev-point_label', 'points');
                echo $username . "</br>";
                echo $points . " " . $label;
                ?>
            </div>

    </div>
    <!-- /.container -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
