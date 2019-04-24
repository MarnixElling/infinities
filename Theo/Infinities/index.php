<?php
include_once 'header.php';
 $product_ids = array();

 //check if Add to Cart button has been submitted
 if(filter_input(INPUT_POST,'add_to_cart'))
 {    
      //if shopping cart $_SESSION variable already exists, add items to the existing cart array
      if(isset($_SESSION['shopping_cart']))  
      {   
           //keep track how many products are in the shopping cart 
           $count = count($_SESSION['shopping_cart']);  //count() starts from 1, array keys start from 0
           
           //create sequential for matching array keys to product id's
           $product_ids = array_column($_SESSION['shopping_cart'],'id'); 
           
           //if the product being added to the cart does NOT exist in the array
           if(!in_array(filter_input(INPUT_GET,'id'), $product_ids))  
           {     
                //fill the $_SESSION shopping cart array with GET id variable and POST form values
                $_SESSION['shopping_cart'][$count] = array //add next array key based on session count
                (  
                     'id'        =>  filter_input(INPUT_GET,'id'),  
                     'name'      =>  filter_input(INPUT_POST,'name'),  
                     'price'     =>  filter_input(INPUT_POST,'price'),    
                     'quantity'  =>  filter_input(INPUT_POST,'quantity')  
                );  
           }  
           else  //product already exists, increase quantity
           {  
                //match array key to id of the product being added to the cart
                for ($i = 0; $i < count($product_ids); $i++)
                {
                    if ($product_ids[$i] == filter_input(INPUT_GET,'id'))
                    {
                        //add item quantity to the existing product in the array
                        $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');
                    }
                } 
           } 
      }  
      else  //if shopping cart doesn't exist, create first product with array key 0
      {  
           //create array using submitted form data, starting from key 0 and fill it with values
            $_SESSION['shopping_cart'][0] = array
            (  
                 'id'        =>  filter_input(INPUT_GET,'id'),  
                 'name'      =>  filter_input(INPUT_POST,'name'),  
                 'price'     =>  filter_input(INPUT_POST,'price'),    
                 'quantity'  =>  filter_input(INPUT_POST,'quantity')  
            );   
      }  
 }  
 
 //removing products from the shopping cart session
 if(filter_input(INPUT_GET,'action'))  
 {  
      if(filter_input(INPUT_GET,'action') == 'delete')  
      {   
           //loop through all products in the shopping cart until it matches GET id variable
           foreach($_SESSION['shopping_cart'] as $key => $product)  
           {  
                if($product['id'] == filter_input(INPUT_GET,'id'))  
                {  
                     //remove product from the shopping cart when it matches with the GET id
                     unset($_SESSION['shopping_cart'][$key]);  
                }  
           }
           //reset session array keys so they match with $product_ids numeric array
           $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
      }  
 }  
 
 //pre_r($product_ids);
 //pre_r($_SESSION['shopping_cart']);
 
 function pre_r($array)
 {
     echo '<pre>';
     print_r($array);
     echo '</pre>';
 }
 ?>  
<style>
    body {
        background-color: darkgray;
    }
</style>

<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/global.css" rel="stylesheet" />
    <link href="css/content.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Infinities</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="background">
        <img src="images/background.png" alt="background" />
    </div>
    <div class="events">
    <?php
    $result = mysqli_query($mysqli, 'SELECT * FROM event');
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="card">';
        echo '<div class="title"><span>'.$row['naam'].'</span></div>';
        echo '<img src="'.$row['image'].'" alt="thumbnail" /> <hr><br>';
        echo '<div class="left"><p>Prijs: </p></div><div class="right">'.$row['prijs'].'</div>';
        echo '<div class="left"><p>Locatie:</p></div><div class="right">'.$row['locatie'].'</div>';
        echo '<div class="left"><p>Datum / Tijd: </p></div><div class="right">'.$row['tijd'].'</div>';
        echo '<div class="left bottom"><p>Verkrijgbare tickets: </p></div><div class="right">'.$row['plaatsen'].'</div>';
        echo '<div class="view">
                <a href="details.php?id='.$row['id'].'"><span>Details <i class="fa fa-info-circle" aria-hidden="true"></i></span></a></div>';
        echo '<div class="purchase">
                <form method="post">
                <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" 
                value="Add to Cart" /> 
                </form>
            </div>';
        echo '</div>';
    }
    ?>
    </div>
</body>
</html>