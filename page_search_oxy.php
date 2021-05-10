<?php
session_start();
ob_start();
?>

<?php
if (isset($_POST['search'])) {
    $response = "<ul><li>No data found!</li></ul>";
   
   
    $host = 'localhost';
    $username = 'u479256151_gbhatt2k';
    $password = 'Dawai@012';
    $databasename = 'u479256151_med_search';


    $connection = new mysqli($host, $username, $password, $databasename);
    $q = $connection->real_escape_string($_POST['q']);

    $sql = $connection->query("SELECT DISTINCT shop_location FROM oxy_search WHERE shop_location LIKE '%$q%' limit 5");
    if ($sql->num_rows > 0) {
        $response = "<ul>";

        while ($data = $sql->fetch_array())
            $response .= "<li><h5>"  . $data['shop_location'] .  "</h5></li>";

        $response .= "</ul>";
    }


    exit($response);
}
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
            margin-top: 50px;
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
        
        /* 9 MAY 2:30am */
        
         .address-btn-class {
            width: 100%;
            height: 5vh;
            margin-top: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .address-btn-class form{
            margin: 0 1vw;
            
        }

        .location-btn {
            background-color: #ffa500;
            border: none;

        }
        
        /* ENDS HERE*/
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
                           <a href="index.php"> <p class="font-weight-light" style=" color:#002649; font-size: 1.5rem; font-weight: 900;">Dawaaii</p></a>
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




    <div>


        <div class="header-text" style="margin-top: -5px;">
            <div class="container" id="front-container">

                <div class="text-area">
                    <!-- <p class="h4 " style="color: black; margin: 2.5rem 0 0.2rem 0;">Searching</p> -->
                    <p class="h6" style="color: #74B9F9; margin-bottom: 3rem; margin-top: 2.5rem;"> <span style="font-weight: bolder;"> Oxygen Kit, Cylinders, Refilling Centers</span></p>

                    <!-- <img src="assets/images/med.png" alt="" style="margin: 2% 7% 2% 0; height: 9rem;"> -->
                    <p class="h6" style="color: black;">What is your</p>
                    <h3><b>Location</b></h3>

                </div>
                
                <!-- 9 MAY 2:30 -->
                <!-- CHANGE THE VALUE OF SUBMIT BUTTON AND INPUT FIELD OF EACH FORM -->

                <div class="address-btn-class">
                    <form action="result_oxy.php" method="get">
                        <input type="submit" value="New Delhi" class="btn btn-sm btn-primary location-btn" name="address1">
                        <input type="hidden" value="New Delhi" name="address-input1">
                    </form>
                    <form action="result_oxy.php" method="get">
                        <input type="submit" value="Mumbai" class="btn btn-sm btn-primary location-btn" name="address2">
                        <input type="hidden" value="Mumbai" name="address-input2">
                    </form>
                    <form action="result_oxy.php" method="get">
                        <input type="submit" value="Bangalore" class="btn btn-sm btn-primary location-btn" name="address3">
                        <input type="hidden" value="Bangalore" name="address-input3">
                    </form>
                </div>
                
                <!-- ENDS HERE -->

                <div class="front-form" style="display:flex; justify-content:center; align-items: center; width:100%;">
                    <form action="result_oxy.php" method="get" style="width:100%; ">

                        <div class="input-group mb-4 border rounded-pill " style="background-color:white; width: 85%; text-align:center; margin-left:3%;">

                            <!--   top     width:85%    margin-left: 2.3rem; -->

                            <div class="input-group-prepend border-0">
                                <button id="button-addon4" type="button" name="index_search" class="btn btn-link text-info"><i class="fas fa-search" style="margin-top: 8px;  color:black;"></i></button>
                            </div>
                            <input type="hidden" id="second-box" name="second-box">

                            <input type="text" id="searchBox" style="border-radius: 30px;" name="search_box" placeholder="Type the name of your city" aria-describedby="button-addon4" class="form-control btn-lg bg-none border-0" autocomplete="off">
                            <div class="col-md-5 response" id="response">

                            </div>

                        </div>

                        <input type="submit" class="btn btn-sm btn-success" name="submit" value="Search" style="background-color: #A8F2BC; padding: 0.5rem 3rem; color: chite; margin-top: 2%; margin-right:10%; border:none;">
                    </form>

                </div>

                
                
                <?php

                if (isset($_POST['index_search'])) {
                    $search_data = $_POST['search_box'];
                    $_SESSION['search_data'] = $search_data;
                    header('location:result_oxy.php');
                }
                ?>

                <?php

                if (isset($_POST['submit'])) {
                    $search_data = $_POST['search_box'];
                    $_SESSION['search_data'] = $search_data;
                    $current_address = $_POST['second-box'];
                    echo $current_address;


                    header('location:result_oxy.php');
                }
                ?>




            </div>
        </div>




    </div>









    <!--



    <footer class="footer" style="margin-top: 18rem;">
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







    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "20rem";
            document.getElementById("main").style.marginLeft = "20rem";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#searchBox").keyup(function() {
                var query = $("#searchBox").val();

                if (query.length > 0) {
                    $.ajax({
                        url: 'page_search_oxy.php',
                        method: 'POST',
                        data: {
                            search: 1,
                            q: query
                        },
                        success: function(data) {
                            $("#response").html(data);
                        },
                        dataType: 'text'
                    });
                }
            });

            $(document).on('click', 'li', function() {
                var result = $(this).text();
                $("#searchBox").val(result);
                $("#response").html("");
            });
        });
    </script>


    

  



</body>

</html>