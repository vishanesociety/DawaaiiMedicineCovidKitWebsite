<?php

require 'dbconfig/config.php';

// for dropdown database 

include('conn.php');

// ends here

ob_start();

// if( $_SESSION['submit-application'] == $_POST['submit-application'] &&isset($_SESSION['submit-application']) ){

// }else{
//     $_SESSION['submit-application'] = $_POST['submit-application'];
// }

?>




<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.css">

    <!-- add this to webpage -->
    <title>Dawaaii - Search medicines in nearby pharmacies</title>
    <link rel="icon" href="assets/images/med.png" type="image/x-icon">
    <!-- till here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">




    <link rel="stylesheet" href="assets/css/style.css">

    <!-- for google api /start -->

    <!-- Google Maps JavaScript library -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyA75U5nC5tleDbvONkaGSy3DEAhIprCh_s"></script>


    <!-- google api end -->




    <!-- For dropdown -->

    <!-- <script src="assets/js/jquery.min.js"></script> -->
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/custom.css"> -->


    <!-- for dropdown  -->







    <style>
        @font-face {
            font-family: gilroy;
            src: url(assets/fonts/Gilroy-Light.otf) format("opentype");
        }


        body {

            font-family: gilroy;

            /* font-family: "Lato", sans-serif; */
        }

        .navigation {
            margin: 0% 2% 2% 1%;
        }

        .nav-down {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: white;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: rgb(89, 218, 89);
            display: block;
            transition: 0.3s;
        }

        /*  .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        */
        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

        .response {
            width: 75%;
            position: absolute;

            background-color: white;

        }
    </style>
    <!-- for location /start -->
    <style>
        #search_input {
            font-size: 18px;
        }

        .form-group {
            margin-bottom: 10px;
            margin-top: 25px;
        }

        .form-group label {
            font-size: 18px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .form-group input:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .container {
            max-width: 1200px;
        }

        .response {
            text-align: left;
            margin: 4rem 0 0 5%;
            width: 100%;
            color: none;

        }

        .admin-form {
            margin-top: 4vw;
            margin-bottom: 6vw;
        }



        .admin-form-label {
            font-size: 6vw;
            font-weight: 900;
        }
    </style>

    <!-- end -->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-196521376-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-196521376-1');
</script>

</head>

<body>


    <header class="header-area header-sticky">
        <nav class="navigation">

            <div class="nav-down" style="margin-top: 2%;">
                <div class="location" style=" display: flex;  justify-content: center; align-items: center;">

                    <div>
                        <a href="index.php"> <img style="height: 3rem; margin-right: 0.5rem; margin-top: 0.5rem;" src="assets/images/med.png" alt=""></a>
                    </div>
                    <div>
                        <a onclick="openNav()" style="text-decoration: none; color: black; cursor: pointer;">
                            <a href="index.php">
                                <p class="font-weight-light" style=" color:#002649; font-size: 1.5rem; font-weight: 900;">Dawaaii</p>
                            </a>
                        </a>
                        <div id="output" style="text-align: center;">

                        </div>

                    </div>
                </div>




                <div class="nav-contact" style="  display: flex; justify-content: flex-end; align-items: center;">
                    <div>
                        <a href="https://wa.me/919880105096" style="text-decoration: none; color: black;">
                            <p class="font-weight-light " style=" color:black; font-size:3ev;"><b>Need help? Chat wth us</b></p>
                        </a>
                    </div>
                    <div style="margin-left: 0.5rem;  display:flex; justify-content:center; align-items: right;">

                        <img src="assets/images/whatsapp.png" style="height: 1.5rem;" alt="">


                    </div>

                </div>



            </div>
        </nav>

    </header>



    <section class="admin-form">
        <div class="container" style="margin-left: 3%;">







            <form action="" method="POST">
                <input type="hidden" name="available" value="Available">
                <div class="form-group">
                    <h2 style="font-size: 1.2rem; margin-bottom: 2%; font-weight: 900;">Name of Resource</h2>
                    <select name="resources" id="cars" style="width: 90%; padding: 1% 1.5% 1% 1.5%; border: 3px solid #E5E5E5; border-radius: 10px;" required>
                        <option value="">Select from dropdown</option>
                        <option value="medicines">Remdesiver, Favipiravir, Fabiflu, Tocilizumab</option>
                        <option value="oxygen"> Oxygen Kit, Cylinders, Refilling Centers </option>

                    </select>
                </div>


                <div class="form-group">
                    <h2 style="font-size: 1.2rem; margin-bottom: 2%; font-weight: 900;">Name of Store/Person</h2>
                    <input type="text" name="name_store_person" class="" style="padding: 1% 1.5% 1% 1.5%; width: 90%; border: 3px solid #E5E5E5; border-radius: 10px;" id="" placeholder="For example Shanti Phama / Ramesh" required>
                </div>
                <div class="form-group">
                    <h2 style="font-size: 1.2rem; margin-bottom: 2%; font-weight: 900;">Conatct Number</h2>
                    <input type="text" name="contact_number" class="" style="padding: 1% 1.5% 1% 1.5%; width: 90%; border: 3px solid #E5E5E5; border-radius: 10px;" id="" placeholder="For example: 9988776655" required>
                </div>
                <div class="form-group">
                    <h2 style="font-size: 1.2rem; margin-bottom: 2%; font-weight: 900;">Address</h2>
                    <input type="text" name="location_address" class="" style="padding: 1% 1.5% 1% 1.5%; width: 90%; border: 3px solid #E5E5E5; border-radius: 10px;" id="" placeholder="For example: GA19 Sarjapur" required>
                </div>

                <div class="form-group">

                    <!-- for drop down -->

                    <!-- <form role="form" class=""> -->
                    <div class="form-group">
                        <label class="control-label col-sm-2">Country</label>
                        <div class="">
                            <select class="form-control countries" style="width: 60%; padding: 1% 1.5% 1% 1.5%; border: 3px solid #E5E5E5; border-radius: 10px;">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">State</label>
                        <div class="">
                            <select class="form-control states" style="width: 60%; padding: 1% 1.5% 1% 1.5%; border: 3px solid #E5E5E5; border-radius: 10px;">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">City</label>
                        <div class="">
                            <select class="form-control cities" name="location_city" style="width: 60%; padding: 1% 1.5% 1% 1.5%; border: 3px solid #E5E5E5; border-radius: 10px;" required>
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>

                    <!-- </form> -->


                    <!-- ends here -->


                </div>





                <!-- <div class="form-group">
                    <h2 style="font-size: 1.2rem; margin-bottom: 2%; font-weight: 900;">City</h2>
                    <input type="text" name="location_city" class="" style="padding: 1% 1.5% 1% 1.5%; width: 90%;border: 3px solid #E5E5E5; border-radius: 10px;" id="" placeholder="Select from dropdown" required>
                </div> -->
                <div class="form-group">
                    <h2 style="font-size: 1.2rem; margin-bottom: 2%; font-weight: 900;">Details</h2>
                    <input type="text" name="details" class="" style="padding: 1% 1.5% 1% 1.5%; width: 90%; border: 3px solid #E5E5E5; border-radius: 10px;" id="" placeholder="Remdesivir, Fabiflu or Oxygen Cylinder, Oxygen Kit" required>
                </div>

                <input type="submit" name="submit-application" class="btn  btn-primary" style="background: #F36D31; color: white;  margin: 1rem 0 2rem 0;">
            </form>

            <?php

            if (isset($_POST['submit-application'])) {

                $resources = $_POST['resources'];
                $resources = str_replace("'", "\'", "$resources");

                $name_store_person = $_POST['name_store_person'];
                $name_store_person = str_replace("'", "\'", "$name_store_person");

                $contact_number = $_POST['contact_number'];
                $contact_number = str_replace("'", "\'", "$contact_number");

                $location_address = $_POST['location_address'];
                $location_address = str_replace("'", "\'", "$location_address");

                $location_city = $_POST['location_city'];
                $location_city = str_replace("'", "\'", "$location_city");

                $details = $_POST['details'];
                $details = str_replace("'", "\'", "$details");

                $available = $_POST['available'];
                $available = str_replace("'", "\'", "$available");

                // for dropdown

                $dataquery = " SELECT * FROM `city` WHERE `id` = '$location_city' ";
                $query = mysqli_query($conn, $dataquery);

                $resultcheck = mysqli_num_rows($query);

                $userdata = mysqli_fetch_array($query);

               // echo $userdata;

               $location_city =  $userdata['city'];
                //ends here




                if ($resources == 'medicines') {



                    $query = "insert into medicine_search values ('','$name_store_person','$location_address','$location_city','$contact_number','$available','$details')";

                    $query_run = mysqli_query($con, $query);


                    if ($query_run) {
                        echo '<script type="text/javascript"> alert("submited")</script>';
                        header('location:admin.php');
                    } else {

                        echo '<script type="text/javascript"> alert("error!!... try again")</script>';
                        echo "error" . mysqli_error($con);
                    }
                } elseif (($resources == 'oxygen')) {

                    $query = "insert into oxy_search values ('','$name_store_person','$location_address','$location_city','$contact_number','$available','$details')";
                    $query_run = mysqli_query($con, $query);


                    if ($query_run) {
                        echo '<script type="text/javascript"> alert("submited")</script>';
                        header('location:admin.php');
                    } else {

                        echo '<script type="text/javascript"> alert("error!!... try again")</script>';
                        echo "error" . mysqli_error($con);
                    }
                } else {
                    echo '<script type="text/javascript"> alert("error!!.... select Resource")</script>';
                }
            }


            ?>



        </div>
    </section>





    <!--

    <footer class="footer" style="margin-top: 3.5rem;">
        <div class="footer-top">
            <div style="margin-left: 2%;">
                <img src="assets/images/med.png" style="height: 4rem;" alt="">
            </div>
            <div style="margin-left: 2%;">
                <h1 class="display-4 font-weight-bold" style="color: white; margin-bottom: 4%; font-weight: 1000;"><b>Dawaaii</b></h1>
            </div>
        </div>
        <div class="container container-footer" style="margin-right:18rem;">
            <div class="row row-footer" style="margin-left: 8%;">
                <div class="footer-col">
                    <h4><b>Let us help you</b></h4>
                    <li><a href="#" style="color:black;">Contact Us</a></li>
                    <li><a href="#" style="color:black;">Privacy Policy</a></li>
                    <li><a href="#" style="color:black;">Terms & Conditions</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="font-weight-bold"><b>join us</b></h4>

                    <li><a href="#" style="color:black;">Retailers</a></li>
                    <li><a href="#" style="color:black;">Medical Representatives</a></li>
    
                </div>
                <div class="footer-col">
                    <h4><b>About</b></h4>
                    <ul>
                        <li><a href="#">Careers</a></li>
                        <div class="footer-icons">
                            <img src="assets/images/instagram.png" alt="" style="height: 35px; margin: 2px; margin-top: 3%; margin-left: -2%;">
                            <img src="assets/images/facaebook.png" alt="" style="height: 30px; margin: 2px;">
                            <img src="assets/images/linkedin.png" alt="" style="height: 30px; margin: 2px;">
                        </div>

                    </ul>
                </div>

            </div>
        </div>
        <div class="footer-bottom">
            <h5 style="text-align: center; margin-top: 4%; margin-bottom: -4%;">Made with <i class="fas fa-heart" style="color: red;"></i> in India by Med Search 2021</h5>
        </div>
    </footer>

    -->

    <!-- jQuery -->
    <!-- <script src="assets/js/jquery-2.1.0.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $("#search").keypress(function() {
                $.ajax({
                    type: 'post',
                    url: 'search.php',
                    data: {
                        name: $("#search").val(),
                    },
                    success: function(data) {
                        $("#product").html(data);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        // $(document).ready(function(){
        // $("#search").keypress(function(){

        var query = $("#search").val();

        if (query.length > 0) {

            $.ajax({
                type: 'post',
                url: 'search.php',
                data: {
                    name: $("#search").val(),
                },
                success: function(data) {
                    $("#product").html(data);
                }
            });
        }
        //});
        //  });
    </script>
    <script>
        if (windows.history.replacestate) {
            windows.history.replacestate(null, null.windows.location.href)
        }
    </script>



    <!-- for dropdown -->


    <script type="text/javascript">
        $(document).ready(function() {


            /*Get the country list */

            $.ajax({
                type: "GET",
                url: "get_countries.php",
                data: {
                    id: $(this).val()
                },
                beforeSend: function() {
                    $('.countries').find("option:eq(0)").html("Please wait..");
                },
                success: function(data) {
                    /*get response as json */
                    $('.countries').find("option:eq(0)").html("Select Country");
                    var obj = jQuery.parseJSON(data);
                    $(obj).each(function() {
                        var option = $('<option />');
                        option.attr('value', this.value).text(this.label);
                        $('.countries').append(option);
                    });

                    /*ends */

                }
            });



            /*Get the state list */


            $('.countries').change(function() {
                $.ajax({
                    type: "POST",
                    url: "get_states.php",
                    data: {
                        id: $(this).val()
                    },
                    beforeSend: function() {
                        $(".states option:gt(0)").remove();
                        $(".cities option:gt(0)").remove();
                        $('.states').find("option:eq(0)").html("Please wait..");

                    },
                    success: function(data) {
                        /*get response as json */
                        $('.states').find("option:eq(0)").html("Select State");
                        var obj = jQuery.parseJSON(data);
                        $(obj).each(function() {
                            var option = $('<option />');
                            option.attr('value', this.value).text(this.label);
                            $('.states').append(option);
                        });

                        /*ends */

                    }
                });
            });




            /*Get the state list */


            $('.states').change(function() {
                $.ajax({
                    type: "POST",
                    url: "get_cities.php",
                    data: {
                        id: $(this).val()
                    },
                    beforeSend: function() {

                        $(".cities option:gt(0)").remove();
                        $('.cities').find("option:eq(0)").html("Please wait..");

                    },

                    success: function(data) {
                        /*get response as json */
                        $('.cities').find("option:eq(0)").html("Select City");

                        var obj = jQuery.parseJSON(data);
                        $(obj).each(function() {
                            var option = $('<option />');
                            option.attr('value', this.value).text(this.label);
                            $('.cities').append(option);
                        });

                        /*ends */

                    }
                });
            });




        });
    </script>

    <!-- for dropdown ends here -->

</body>

</html>