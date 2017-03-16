	<!DOCTYPE HTML>
 	<html>
 	<head>
 	<title>Search Page</title>
 	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link href="../CIT2318/css/startbootstrap-creative-gh-pages/css/creative.min.css" rel="stylesheet" type="text/css">
 	</head>
 	<body>
        <a href="index.php">Link To Index Page (search Facility)</a>
        
        
        </body>
</html>
<?php
try{
     $conn = new PDO('mysql:host=localhost;dbname=u1577166', 'root', ''); // why??
}
catch (PDOException $exception) 
{
    echo "Oh no, there was a problem" . $exception->getMessage();
}
$productId=$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM product WHERE product.id = :id");
$stmt->bindValue(':id',$productId);
$stmt->execute();

if($product=$stmt->fetch()){
	echo "<h1>".$product['name']." " ."</h1>";
	echo "<p>Description: ".$product['Description'].".</p>";
    echo "<p>Servings: ".$product['Quantity_servings']."</p>";
    
}
$productId=$_GET['id'];
            {$stmt2 = $conn->prepare("SELECT ingredients.NAME, product.name FROM ingredients INNER JOIN product_ingredients ON ingredients.id=product_ingredients.ingredients_id INNER JOIN product ON product.id=product_ingredients.product_id WHERE product.id= :id");
             $stmt2->bindValue(':id',$productId);
$stmt2->execute();	
echo "<table>";
    echo "<tr><th>Product Ingredients:</th>";
while ($ingredients = $stmt2->fetch())
{
    
    echo "<tr>";
    echo "<td>".$ingredients["NAME"]."</td>";
    echo "</tr>";
}
      }



?>