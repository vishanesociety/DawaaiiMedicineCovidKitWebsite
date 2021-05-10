<?php
//error_reporting(0);
// Create connection

$host = 'localhost';
$username = 'u479256151_gbhatt2k';
$password = 'Dawai@012';
$databasename = 'u479256151_med_search';

$conn = mysqli_connect($host, $username, $password, $databasename);
$sql = "SELECT * FROM medicine_search WHERE shop_location LIKE '%" . $_POST['name'] . "%'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

?>

        <div class="contain" id="product-result">
           <form action="manage_cart.php" method="POST">
            <div class="result-product-foot" style="margin-top: 1rem;" >
                <div class="address-field" >
                    <h5><b style="font-weight: 600;" ><?php echo $row['med_shop'] ?></b></h4>
                </div>


                <div class="button-field" style="text-align: center;">                  
                    <button type="submit" class="btn btn-sm disabled" name="Add_To_Cart" style="background-color: #2EF365; border: none; color: black; padding: 6% 15% 6% 15%; margin: 0.3rem;  border-radius:10px;"><b><?php echo $row['available_status'] ?></b></button>
                </div> 
            </div>
            <div class="result-product-foot">
                <div class="address-field" style="text-align:left;">
                    <h6><?php echo $row['shop_address'] ?></h6>
                </div>

                <div class="button-field" style="text-align: center;">
                    <!-- <button type="submit" class="btn btn-sm" name="Add_To_Cart" style="background-color: #5fd37e; border: none; color: black; padding: 3% 5% 3% 5%; margin: 0.3rem;  border-radius:10px;"><b>Book Pickup</b></button> -->
                    <!-- <input type="hidden" name="Item_Name" value="<?php // echo $row['med_name'] ?>">
                    <input type="hidden" name="Price" value="<?php // echo $row['price'] ?>">
                    <input type="hidden" name="Shop_Name" value="<?php //echo $row['med_shop'] ?>">
               -->
                    <a href="tel:<?php echo $row['contact']?>"><button type="button" class="btn btn-sm" style="background-color: #A8F2BC; border: none; color: black; padding: 6% 17% 6% 17%; border-radius:10px;"><b>  Contact  </b></button></a>
                </div>
            </div>

            <div style="width: 90% ; border-top: 2px solid grey; margin: 2% 5% 1% 3%;">
                 <h6 style="margin-top: 0.3rem; margin-bottom: 0.5rem;"><b style="font-weight: 900;"><?php echo $row['meds'] ?></b></h6>
            </div>
            </form>
        </div>



<?php







    }
} else {
    ?>
    <div style="width: 100%; text-align: center;">
      <?php  echo "<tr><td>Unable to find product</td></tr>"; ?>
    </div>
    <?
}

?>