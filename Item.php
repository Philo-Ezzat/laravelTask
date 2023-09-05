
<?php
session_start();
require "../../Controller/Db_connection.php";

if (isset($_GET['Search'])){
    $cleanStr = preg_replace('/[^A-Za-z0-9]/', '', $_GET['Search']);
    $_SESSION['Search']=$cleanStr;
    header("location:product.php");
    die();
}
$errormsg='';
$total=0;

//db connection

if(!$conn){
    echo 'Error In Database connection';
}
if(isset($_GET['id'])){
    $selectedproductid = $_GET['id'];
}

if(isset($_SESSION['username']) && $_SESSION['username'] != null){
    $USERID=$_SESSION['id'];
    $id=$USERID;
    $un = $_SESSION['username'];
    $addedornot = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM cart WHERE Product_ID='".$selectedproductid."' AND USER_ID='".$USERID."'  "));
    $retrievecartproducts=mysqli_query($conn,"SELECT * FROM product JOIN cart ON product.ID=cart.Product_ID WHERE User_ID = '".$USERID."' ");
    $retrievedata = mysqli_fetch_all($retrievecartproducts,MYSQLI_ASSOC);
    $numberofitemsincrt= mysqli_num_rows($retrievecartproducts);

} 
if(isset($_POST['additemtocartwithbutton']) && isset($_POST['submitadditemtocartwithbutton'])){
    mysqli_query($conn,"INSERT INTO cart values('".$id."','".$_POST['additemtocartwithbutton']."','1')");
    header("Refresh:0");
      
        
}
    
    

 
    
    //Retrieve Product Data
    $Retrievealldata = mysqli_query($conn,"SELECT * FROM product WHERE ID='".$selectedproductid."'  ");
    $retrievedData=mysqli_fetch_all($Retrievealldata,MYSQLI_ASSOC);
    
    //check Added To cart OR Not

    //if "1" means added 
    $sq = "SELECT * FROM cate_product JOIN product ON cate_product.Product_Id=product.ID  JOIN category ON cate_product.Category_ID =category.ID WHERE Product_Id=$selectedproductid; ";
    $result2 =   $conn->query($sq);
    $row2 = $result2->fetch_assoc();
   $catID= $row2['Category_ID'];
    $sql = "SELECT * FROM cate_product JOIN product ON  cate_product.Product_Id=product.ID WHERE Category_ID = $catID   LIMIT 5";
    $result =   $conn->query($sql);
   

    
    
    
    //Add To Cart Function
    if(isset($_POST['productquantitywanttoadd']) && isset($_POST['productidwanttoadd']) && isset($_POST['addtocartbutton'])){
        mysqli_query($conn,"INSERT INTO cart values('".$USERID."','".$_POST['productidwanttoadd']."','".$_POST['productquantitywanttoadd']."')  ");
        header("Refresh:0");
    
    }
    
    
    


    // echo '<pre>';
    // print_r($retrievedata);
    // echo '</pre>';
    
    

if (isset($_GET['Search'])){
    $cleanStr = preg_replace('/[^A-Za-z0-9]/', '', $_GET['Search']);
    $_SESSION['Search']=$cleanStr;
    header("location:product.php");
    die();
}

?>


<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo$retrievedData[0]['Product_name'] ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
            <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/css/owl.c   arousel.min.css">
            <link rel="stylesheet" href="../assets/css/flaticon.css">
            <link rel="stylesheet" href="../assets/css/slicknav.css">
            <link rel="stylesheet" href="../assets/css/animate.min.css">
            <link rel="stylesheet" href="../assets/css/magnific-popup.css">
            <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="../assets/css/themify-icons.css">
            <link rel="stylesheet" href="../assets/css/slick.css">
            <link rel="stylesheet" href="../assets/css/nice-select.css">
            <link rel="stylesheet" href="../assets/css/style.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
.card-container {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  padding-bottom:3%;
}

.card {
  width: 18%;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  text-align: center;
  padding-bottom:1%;
}
    .card img {
        max-width: 100%;
        height: auto;
    }
    .item-name {
        
        font-size: 18px;
        font-weight: bold;
    }
    .item-price {
        font-size: 16px;
    
    }
    .add-to-cart {
        width:80%;

        padding-bottom:5%;
        background-color: black;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
        
    }
 #cartnumafter::before{
          content:"<?php echo $numberofitemsincrt ?>";
        }

            </style>
   </head>

   <body>
       


    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">

               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="1.php"><img src="../assets/img/logo/Logo.png" width="150px" hieght="50px"></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="../../View/Users/1.php">Home</a></li>
                                            <li><a href="../../View/Users/categories.php">Categories</a></li>

                                            <?php 
                                            if(isset($_SESSION['username']) && $_SESSION['username'] != null){
                                    echo'<li><a href="#">Account</a>
                                    <ul class="submenu">
                                        <li><a href="../../View/Customers/loginAndSecurity.php">Login & security</a></li>
                                        <li><a href="../../View/Customers/Orders.php">Orders</a></li>
                                        <li><a href="../../View/Customers/Address&Payments.php">Payments & Address</a></li>
                                        <li><a href="../../View/Customers/logout.php">Logout</a></li>
                                    </ul>
                                </li>';
                                
                                   }
 ?>
         
                                            <li><a href="../../View/Customers/contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                <form action="#" method="get" >
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <input type="text" name="Search" placeholder="Search products" >
                                            <div class="search-icon">
                                                
                                                <i class="fa fa-search"></i>
                                                
                                            </div>
                                        </div>
                                     </li>
                                     </form>
                                    <li>
                                    <div class="shopping-card" id="cartnumafter">
                                                                                    <a href="../../View/Customers/cart.php"><i class="fa fa-shopping-cart" style="font-size:24px"></i></a>
                                        </div>
                                    </li>
                                    <?php 
                                   
                                   if(isset($_SESSION['username']) && $_SESSION['username'] != null){
                                    echo'<li class="d-none d-lg-block"> <a  class="btn header-btn"style="color:white; ">';
                                    echo $un;
                                   }
                                   else{
                                    echo'<li class="d-none d-lg-block"> <a href="../../View/Customers/login.php" class="btn header-btn">';
                                    echo "Sign in";
                                } 
                                   ?>
                                   </a></li>
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>


<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo$retrievedData[0]['Photo'] ?>" alt="..." style="max-width:350px;"></style></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder" style="font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;"><?php echo$retrievedData[0]['Product_name'] ?></h1>
                        <div class="fs-5 mb-5">
                            <br>
                            <h4>Price : <?php echo$retrievedData[0]['Price']; ?>.LE</h4>
                        </div>
                        <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
    
                        </div>
                        </div>
                                    <h2 class="lead"> <?php echo  $retrievedData[0]['Description'] ?></h2>
                        <div class="">
                            <?php
                           if(isset($_SESSION['username']) && $_SESSION['username'] != null){
                            if($retrievedData[0]['Quantity']==0){
                                ?>
                                <h5 class="mx-auto text-success" style="margin-left:-100px;">Item is out of stock</h5>
                                <?php
                            }
                            else{
                           if($addedornot){
                                ?>
                                <h5 style="color:green;font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;">Already added To Cart</h5>
                                <a href="../Customers/cart.php"><button type="submit" class="btn-outline-dark rounded mx-3" style="cursor:pointer;">View Cart ?</button></a>

                                <?php
                            }
                            else{
                            ?>

                            <form style="display: flex; flex-direction:row;" method="POST">

                                                        
                            <input class="form-control text-center me-3" name="productquantitywanttoadd" id="inputQuantity" type="num" value="1" style="max-width: 3rem">
                            <input class="form-control text-center me-3" name="productidwanttoadd" id="inputQuantity" type="hidden" value="<?php echo$retrievedData[0]['ID'] ?>" style="max-width: 3rem">
                            <button class="btn-outline-dark flex-shrink-0 mx-2 rounded" name="addtocartbutton" type="submit" style="cursor:pointer;">
                            <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i>
                                Add to cart
                            </button>
                            </form>

                            <?php
                                
                            }}}
                            else{ ?>
                               
<a href="../../View/Customers/login.php"><button   class="btn_3" style="margin-left:-10px; margin-top:30px; "> 
Sign In</button></a>
<?php   }

                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--------Main item Page End------->
        <section class="bg-light d-flex flex-column" > 
        <h3 class="mx-auto m-3" style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Related Items</h3>
        <div class="container d-flex flex-row">


        <!------Card---------->
        <div class="card-container">
    <?php
    while($row = $result->fetch_assoc()){
?>      
               <div class="card">
                    <!------Card --->
                    <div class="col-xl-4 col-lg-6 rounded">
                        <div>
                        
                        <a href="Item.php?id=<?php echo $row['ID'];?>" >
                        
                        <div class="" style="width:500%;height:370px;">
                        <img src="<?php echo $row['Photo'];?>" style="width:230px;height:230px;">
                        <h5 class="item-name"><?php echo $row['Product_name'];?></h5>
                        <p class="item-price "><?php echo $row['Price'];?>.LE</p></a>
                        <?php
                        if(isset($_SESSION['username']) && $_SESSION['username'] != null){
                            if($row['Quantity']==0){
                                ?>
                                <p class="mx-auto text-success">Item is out of stock</p>
                                <?php
                            }
                            else{
                        if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM cart WHERE Product_ID='".$row['ID']."' AND USER_ID='".$id."'  "))){
                            ?>

                            <p class="mx-auto text-success">Added To Cart</p>
                            <?php
                        }
                        else{
                            ?>
                            <form method="POST">
                            <input type="hidden" name="additemtocartwithbutton" value="<?php echo $row['ID'];?>">
                            <p style="position: relative;bottom:0px;">
                            <button type="submit" name="submitadditemtocartwithbutton"class="add-to-cart" style="margin-left:-12px;" >Add to Cart</button>
                            </p>
                            </form>
                            <?php
                        }}}
else{?>

<a href="../../View/Customers/login.php"><button class="add-to-cart" style="margin-left:-12px;">Add to Cart</button></a>

<?php
 
}

                        ?>
                        
                        </div>
                            
                            
                        </div>
                         <!------Card --->
                     </div>
                </div>
                <?php        
    } 
    ?>
</div>
</div>
        </section>
          
        





<!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
    
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/slick.min.js"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/js/wow.min.js"></script>
    <script src="./assets/js/animated.headline.js"></script>
    
    <!-- Scrollup, nice-select, sticky -->
    <script src="./assets/js/jquery.scrollUp.min.js"></script>
    <script src="./assets/js/jquery.nice-select.min.js"></script>
    <script src="./assets/js/jquery.sticky.js"></script>
    <script src="./assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="./assets/js/contact.js"></script>
    <script src="./assets/js/jquery.form.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/mail-script.js"></script>
    <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/js/plugins.js"></script>
    <script src="./assets/js/main.js"></script>

    
</body>

</html>