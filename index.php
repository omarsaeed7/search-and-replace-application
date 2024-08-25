<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> <!-- BootStrap-->

    <style>
        mark {
            background-color: rgba(20, 255, 12, 0.2);
            border-radius: 5px;
        }

        .redmark {
            background-color: rgba(233, 10, 32, 0.2);
            color: #000;
        }
    </style>
</head>
<!-- ---------------------------------- -->

<body>
    <!-- ------------------- Container -------------------- -->
    <div class="container-fluid" style="height: 100vh;">
        <div class="d-flex flex-column align-items-center mx-auto shadow p-4" style="margin-top: 200px; max-width :850px; ">
            <!-------------------- Form ------------------>
            <form action="" method="get" style="width:100%">
                <!-- Start Of Search And Replace Row -->
                <div class="row ">
                    <!-- Start Of Search Input -->
                    <div class="col">
                        <input type="search" name="search" class="form-control" placeholder="Search ..."
                            value="
<?php
if (isset($_GET['search'])) {
    echo $_GET['search'];
}
?>">
                    </div>
                    <!-- End Of Search Input -->

                    <!-- Start Of Replace -->
                    <div class="col">
                        <input type="text" name="replace" class="form-control" placeholder="Replace ..." value="
<?php if (isset($_GET['replace'])) {
    echo $_GET['replace'];
}
?>">
                    </div>
                    <!-- End Of Replace -->
                </div>
                <!-- End Of Search And Replace Row -->

                <!-- Start of Text Area Row -->
                <div class="row mt-3">
                    <div class="col">
                        <textarea class="form-control" name="article" rows="5">
<?php if (isset($_GET['article'])) {
    echo $_GET['article'];
} ?></textarea>
                    </div>
                </div>
                <!-- End of Text Area Row -->

                <!-- Start of buttons  section -->
                <div class="btns">
                    <button class="btn btn-success" style="margin-top: 30px;" type="submit" name="submit">
                        Search & Replace
                    </button>
                    <button class="btn btn-danger" style="margin-top: 30px;" type="reset" name="reset">
                        Reset
                    </button>
                </div>
                <!-- End of button section -->
            </form>
            <!-- End Of Form -->

            <!-- Start of Result Of Search Section -->
            <div class="w-100" style="text-align: center;">
                <?php
                // Back-End Work 
                /* Search in text Application */
                // Checking if sumbint button pressed 
                if (isset($_GET['submit'])) {
                    include_once 'function.php';
                    $searchfun = str_search($_GET['article'], $_GET['search']);
                    if ($_GET['article'] != '' && $_GET['search'] != '') :
                        if ($searchfun == 0) {
                            echo "<span class = 'text-danger' >No Matching Words </span>";
                        }
                        if ($searchfun != 0) :
                            echo "Number of matches : <span class= 'text-info'>" . $searchfun . "</span> Times";
                        endif; ?>
                        <div class="w-100 shadow">
                            <?php
                            if ($searchfun != 0 && $_GET['replace'] != '')
                                echo replace($_GET['article'], $_GET['search']);
                            ?>
                        </div>
                        <!-- Start Of Progress Bar -->
                        <div class="w-100 mt-4">
                            <div class="progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-dark" style="width: <?php
                                                                                echo percentage($_GET['article'], $_GET['search']); ?>%"></div>
                            </div>
                            <div class="mt-3 w-100 row ">
                                <div class="col" style="max-height: 250px; overflow:auto;">
                                </div>
                            </div>
                        </div><!--End of Progress bar -->
                        <div class="shadow">
                    <?php
                    endif;
                }
                if (isset($_GET['article']) && $searchfun != 0) {
                    if ($_GET['article'] != '' && $_GET['search'] != '' && $_GET['replace'] != '')
                        echo replace2($_GET['search'], "<mark class='redmark'>$_GET[replace]</mark>", $_GET['article']);
                } ?>

                        </div>
                        <!-- Start Of Progress Bar -->
                        <div class="w-100 mt-4">
                            <div class="progress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-dark" style="width: <?php
                                                                                echo percentage2($_GET['article'], $_GET['replace'], $_GET['search']); ?>%"></div>
                            </div>
                            <div class="mt-3 w-100 row ">
                                <div class="col" style="max-height: 250px; overflow:auto;">
                                </div>
                            </div>
                        </div><!--End of Progress bar -->
            </div>

            <!-- End of PHP -->

        </div>
    </div>
    <!-- End of Container -->
</body>

</html>