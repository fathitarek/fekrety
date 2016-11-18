@extends('layout.header')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    All Posts

                </h1>

                <!-- First Blog Post -->
              <?php
 foreach ($pst as $ps) {
               ?>
                <p class="lead">
                  <?php
                  $members = \DB::select('select * from members where member_id=' . "'$ps->member_id'");
foreach ($members as $member) {

                   ?>
                    by <a href="#"><?php echo $member->name;?></a>
                    <?php } ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $ps->time;?></p>
                <p><?php echo $ps->post;?></p>

                <hr>
<?php } ?>

                <!-- Pager -->
                 <?php echo $pst->render(); ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->


        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
