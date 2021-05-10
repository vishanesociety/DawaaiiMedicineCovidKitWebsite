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

    $sql = $connection->query("SELECT med_name FROM med_data WHERE med_name LIKE '%$q%' limit 5");
    if ($sql->num_rows > 0) {
        $response = "<ul>";

        while ($data = $sql->fetch_array())
            $response .= "<li><h5>"  . $data['med_name'] .  "</h5></li>";

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

            #text-u {
                font-size: 20%;
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
                            <img style="height: 3rem; margin-right: 0.5rem; margin-top: 0.5rem;" src="assets/images/med.png" alt="">
                        </div>
                        <div>
                            <a onclick="openNav()" style="text-decoration: none; color: black; cursor: pointer;">
                                <p class="font-weight-light" style=" color:#002649; font-size: 1.5rem; font-weight: 900;">Dawaaii</p>
                            </a>
                            <div id="output" style="text-align: center;">

                            </div>

                        </div>
                    </div>

                    


                    <div class="nav-contact" style="  display: flex; justify-content: flex-end; align-items: center;">
                        <div>
                            <a href="https://wa.me/919880105096" style="text-decoration: none; color: black;">
                                <p class="font-weight-light " style=" color:black; font-size:3ev; font-weight: bold;">Need help? Chat wth us</p>
                            </a>
                        </div>
                        <div style="margin-left: 0.5rem;  display:flex; justify-content:center; align-items: right;">

                            <img src="assets/images/whatsapp.png" style="height: 1.5rem;" alt="">

                           
                        </div>

                    </div>



                </div>
            </nav>

        </header>   


    <!-- <section style="margin-top: 12vw;">

        <div class="container">

             <h2 style="color:#002649; text-align:center;"><b>Contribute Data</b></h2> 
           
        </div>

    </section> -->


    <section style="margin-top: 8vw;">

        <div class="container" style="display: flex; justify-content:space-between; align-items:center;">

            <div style="width: 45%; display: flex; justify-content:center; background: #FFB6C1; align-items:center; border-radius: 8px;;">
                <div style="width: 20%; text-align:center; margin:12% 5% 12% 5%;">

                   <a href="page_search.php"> <img src="assets/images/image 63.png" style="height: 6vw;" alt=""></a>

                </div>
                <div style="width: 50%; text-align:left; margin: 8% 5% 8% 5%;">

                   <a href="page_search.php"> <h6 style="color: black; font-weight:900; font-size: 2vw; "><b>Remdesiver,</b></h6></a>
                   <a href="page_search.php"> <h6 style="color: black; font-size: 2vw;"><b>Favipiravir, Fabiflu,</b></h6></a>
                   <a href="page_search.php"> <h6 style="color: black; font-size: 2vw;"><b>Tocilizumab</b></h6> </a>
                </div>
            </div>

            <div style="width: 45%; display: flex; justify-content:center; background: #ADD8E6; align-items:center; border-radius: 8px;;">
                <div style="width: 20%; text-align:center; margin:12% 5% 12% 5%;">

                <a href="page_search_oxy.php"> <img src="assets/images/image 64.png" style="height: 6vw;" alt=""></a>

                </div>
                <div style="width: 50%; text-align:left; margin: 8% 5% 8% 5%;">

                    <a href="page_search_oxy.php"> <h6 style="color: black; font-size: 2vw; font-weight: 900;"><b>Oxygen Refuling</b></h6></a>
                    <a href="page_search_oxy.php"> <h6 style="color: black; font-size: 2vw;"><b>Centers</b></h6></a>
                    <a href="page_search_oxy.php"> <h6 style="color: black; font-size: 2vw;"><b>&Zones</b></h6></a>

                </div>
            </div>




        </div>

    </section>


 <section style="margin: 8vw 0 6vw 0; background: #74B9F921;">
        <div class="container" style="display: flex; justify-content: center; align-items: center; ">

            <div class="" style="background: #E5E5E5; border-radius: 8px; margin: 4vw 0 4vw 0;">

                <div style="margin: 3.5vw 3vw 2vw 3vw; text-align: center; ">
                    <a href="admin.php"><img src="assets/images/image 65.png" style="height: 6vw;" alt=""></a>
                </div>

                <div style="margin: 0 3vw 3vw 3vw; text-align: center;">
                  <a href="admin.php">  <h6 style="font-size: 2vw; color: black;"><b>Contribute</b></h6></a>
                    <a href="admin.php"><h6 style="font-size: 2vw; color: black;"><b>Data</b></h6></a>
                </div>

            </div>

        </div>
    </section>





    <section style="margin-top: 8vw; ">
        <div class="container">

            <div style="text-align: center; background: #808080; border: 2px solid #808080; border-radius:8px;">

                <h6 style="margin: 4vw 4vw 0rem 4vw; font-size: 2vw; color:white;"><span style="font-weight: bolder;">Medicine, Covid KIT, Vaccine, Test Center</span> Search and Book </h5>
                <h6 style="margin: 1vw 4vw 4vw 4vw; color:white; font-size:2vw;"> will be live soon we are trying hard to make it live for you</h5> 


            </div>

        </div>
    </section>


   
   <!--     <section style="margin: 5vw 0 5vw 0;">
            <div class="container" style="display: flex; justify-content: center; align-items: center;">
                <div style="width: 50%;  display: grid;">
                    <div>
                    <h2 style="font-size: 4vw;">We distribute</h1>
                    <h2 style="font-size: 4vw;">medicine to</h1>
                    <h2 style="font-size: 4vw;">save life</h1>-->
                         <!-- <div style="margin-top: 2rem;"> 
                            <button  class="btn btn-xs" style="background: #F36D31; color: white; ">Organization Donation</button>
                        </div>   
                        <div style="margin-top: 1rem;"> 
                            <button class="btn btn-xs" style="background: #2797FF; color: white; padding: 1vw 1vw 1vw 1vw; border: none; border-radius: 10px;">   Individual  Donation</button>
                        </div>  -->
                        <!-- <input type="submit" name="submit-application" class="btn  btn-primary" style="background: #F36D31; color: white; margin: 1rem 0 2rem 0;">
                        <input type="submit" name="submit-application" class="btn  btn-primary" style="background: #F36D31; color: white; margin: 1rem 0 2rem 0;">
            -->       <!--  <div style="height: 20%; text-align: center; width: 50%; background:#F36D31; margin: 1rem 0 1rem 1rem; border-radius:4px; display: flex; justify-content: center; align-items: center;">
                            <div><h6 style="font-size: 1.8vw; color: white; ">Organization Donation</h6></div>
                        </div>
                        <div style="height: 20%; text-align: center; width: 50%; background: #2797FF; margin: 0.5rem 0 1rem 1rem; border-radius:4px; display: flex; justify-content: center; align-items: center;">
                            <div><h6 style="font-size: 2vw; color: white; ">Individual  Donation</h6></div>
                        </div>
                    </div>
                   


                </div>
                <div style="width: 50%; position:relative; margin-right:1rem;">
                    <img src="assets/images/donation_sec.png" style="height: 17rem; margin-right:1rem;" alt="">
                </div>
            </div>
        </section>

-->


    <!-- Donate Medicine -->

<!--
    <section style="margin: 4.5rem 0 6vw 0;" >
        <div class="container" style="display: flex; justify-content: center; align-items: center;">
            <div style="width: 30%;  margin: auto; text-align: center;" >

                <h4 style="color: black; font-size: 5vw; "><b>231+</b></h1>
                <h2 style="color: #F36D31; font-size:3vw;">donations</h2>
                <h2 style="color: #F36D31; font-size:3vw;">by people</h2>

            </div>
            <div style="width: 30%;  margin: auto; text-align: center;">

                <h4 style="color: black; font-size: 5vw;"><b>$1000</b></h1>
                <h2 style="color: #F36D31; font-size: 3vw;">of medicine</h2>
                <h2 style="color: #F36D31; font-size: 3vw;">donated</h2>

            </div>

            <div style="width: 30%;  margin: auto; text-align: center;">

                <h4 style="color: black; font-size: 5vw;"><b>5000+</b></h1>
                <h2 style="color: #F36D31; font-size: 3vw;">medicine</h3>
                <h2 style="color: #F36D31; font-size: 3vw;">donated</h3>

            </div>
        </div>
    </section>

-->
<!-- 
    <section class="section" style="margin-top: 5rem; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-8 col-xs-8" style="margin: auto;">
                    <div class="features-item" style="background-color: #74B9F9;">
                        <div class="features-icon" style="text-align: initial;">

                            <img src="assets/images/1.png" style="height: 3.5rem;" alt="">
                            <p class="h4" style="font-weight: 1000; color: black; margin-bottom: 1rem;"><b>Check item Stock</b></h4>
                            <h6 class="font-weight-normal" style="color: black; font-size: 1rem;">Check medicine inventory at numerous stores at a glance and easily find what you are looking for </h6>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-8 col-xs-8" style="margin:auto;">
                    <div class="features-item" style="background-color: #74B9F9 ;">
                        <div class="features-icon" style="text-align: initial;">

                            <img src="assets/images/2.png" style="height: 3.5rem;" alt="">
                            <p class="h4" style="font-weight: 1400; color: black; margin-bottom: 1rem;"> <b>Compare Prices</b></p>

                            <h6 class="font-weight-normal" style="color:black; font-size:1rem;">Check prices at different retailers to get the best deal, no matter what medicine you are searching for.</h6>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-8 col-xs-8" style="margin: auto;">
                    <div class="features-item" style="background-color: #74B9F9 ;">
                        <div class="features-icon" style="text-align: initial;">

                            <img src="assets/images/3.png" style="height: 3.5rem;" class="height:5rem;" alt="">
                            <p class="h4" style="font-weight: 1400; color: black; margin-bottom: 1rem;"> <b>Vocal for local</b></p>

                            <h6 class="font-weight-normal" style="color: black; font-size: 1rem; ">Your local businesses need your help. Find the same medicine you might buy online from a local retailer</h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <section class="section" style="margin-top: 4rem;">
        <div class="sub-section" style="border-radius: 5px;">
            <div class="container" style="display: grid; justify-content: center; align-items: center;">

                <div class="">
                    <!-- <h3 style="text-align: center;">Unable to find the product, chat with us and we will help you out of the way to find it</h3> -->
                    <h4 class=" text-center" style="font-size: 1ev; color:black; margin-bottom:2rem;">Find the other links below to explore other resources</h2>
                </div>
                <div class="" style="margin: 2% auto;">
                    <a href="https://external.sprinklr.com/insights/explorer/dashboard/601b9e214c7a6b689d76f493/tab/1?id=DASHBOARD_601b9e214c7a6b689d76f493"><button type="button" class="btn btn-sm" style=" border-radius:3px;background-color: #74B9F9; color: black; height: 5vw; margin-right:7px">
                            <h6 style="font-size: 2vw;"><b>Sprinklr India</b></h6>
                        </button></a>
                
                    <a href="https://linktr.ee/indiacovid19resources"><button type="button" class="btn btn-sm" style=" border-radius:3px;background-color: #66b375; color: black; height: 5vw; margin-right:7px">
                            <h6 style="font-size: 2vw;"><b>Covid Resource </b></h6>
                        </button></a>
                    <a href="https://covidfacts.in/"><button type="button" class="btn btn-sm" style=" border-radius:3pxx;background-color: #F1CE84; color: black; height: 5vw; margin-right:7px">
                            <h6 style="font-size: 2vw;"><b>Covid-19 Facts</b></h6>
                        </button></a>
                    <a href="https://verifiedcovidleads.com/"><button type="button" class="btn btn-sm" style=" border-radius:3px;background-color: #D68A6D; color: black; height: 5vw; margin-right:7px">
                            <h6 style="font-size: 2vw;"><b> Covid Leads  </b></h6>
                        </button></a>
            </div>
        </div>





    </section>
    
    <!--
    
    <footer class="footer" style="margin-top: 5rem;">
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
                        url: 'index.php',
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


    <!-- for location search/ start -->

    <script>
        var searchInput = 'search_input';

        $(document).ready(function() {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types: ['geocode'],
                /*componentRestrictions: {
                 country: "IN",
                 postalCode: "221001",
                }*/
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var near_place = autocomplete.getPlace();
            });
        });
    </script>

    <!-- end -->


    <!-- geoAPI script -->
    <script>
        var x = document.getElementById('output');

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "not supported";
            }
        }

        function showPosition(position) {
            // x.innerHTML = "latitude = " + position.coords.latitude;
            // x.innerHTML += "<br />"
            // x.innerHTML += "longitude = " + position.coords.longitude;
            var locAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," + +position.coords.longitude + "&key=AIzaSyA75U5nC5tleDbvONkaGSy3DEAhIprCh_s";
            // var locAPI = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," + +position.coords.longitude + "&key=AIzaSyA75U5nC5tleDbvONkaGSy3DEAhIprCh_s";
            // x.innerHTML = locAPI;
            $.get({
                url: locAPI,
                success: function(data) {
                    console.log(data);
                    document.getElementById("second-box").value = data.results[0].address_components[1].long_name + ", " + data.results[0].address_components[2].long_name + ", " + data.results[0].address_components[3].long_name + ", " + data.results[0].address_components[4].long_name + ", " + data.results[0].address_components[6].long_name;


                    // x.innerHTML = data.results[0].address_components[1].long_name + ", ";
                    // x.innerHTML += data.results[0].address_components[2].long_name + ", ";
                    // x.innerHTML += data.results[0].address_components[3].long_name + ", ";
                    x.innerHTML += data.results[0].address_components[4].long_name + ", ";
                    x.innerHTML += data.results[0].address_components[5].long_name + ", ";
                    x.innerHTML += data.results[0].address_components[6].long_name;
                }
            });
        }
    </script>
    <!-- end -->



</body>

</html>