

<!DOCTYPE HTML>
 	<html>
 	<head>
 	<title>Database Design</title>
        <link href="../CIT2318/css/startbootstrap-creative-gh-pages/css/creative.min.css" rel="stylesheet" type="text/css">
 	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
 	</head>
 	<body>
        <a href="index.php">Link To Index Page (search Facility)</a>
 	<h1>Databse Design and Data Dump</h1>
    <p>My senario is based on a website that informs users of the various affecs and ingredients in differ gym suppliments you can buy online.</p>    
   <img src="../img/class%20diagrams%20(2).jpg" alt="class diagrams">
        
        
<?php
try{
     $conn = new PDO('mysql:host=localhost;dbname=u1577166', 'root', ''); // why??
}
catch (PDOException $exception) 
{
    echo "Oh no, there was a problem" . $exception->getMessage();
}
        
// ingredients table
echo "<table>";
echo "<tr><th>ID</th><th>Ingredient Name</th><tr>";
$query = "SELECT * FROM ingredients";
$resultset = $conn->query($query);

while ($ingredients = $resultset->fetch()) 
{
	
	echo "<tr>";
	echo "<td>".$ingredients["id"]."</td>";
	echo "<td>".$ingredients["NAME"]."</td>";
	echo "</tr>";
}
echo "</table>";
        
//products table
echo "<table>";
echo "<tr><th>ID</th><th>Product Name</th><th>Description</th><th>No. Servings</th><tr>";
$query = "SELECT * FROM product";
$resultset = $conn->query($query);

while ($product = $resultset->fetch()) 
{
	
	echo "<tr>";
	echo "<td>".$product["id"]."</td>";
    echo "<td>".$product["name"]."</td>";
    echo "<td>".$product["Description"]."</td>";
	echo "<td>".$product["Quantity_servings"]."</td>";
	echo "</tr>";
}
echo "</table>";
        
//function table
        echo "<table>";
echo "<tr><th>ID</th><th>Function</th><tr>";
$query = "SELECT * FROM pfunction";
$resultset = $conn->query($query);

while ($pfunction = $resultset->fetch()) 
{
	
	echo "<tr>";
	echo "<td>".$pfunction["id"]."</td>";
	echo "<td>".$pfunction["name"]."</td>";
	echo "</tr>";
}
echo "</table>";
        
//seller table
        echo "<table>";
echo "<tr><th>ID</th><th>Seller Name</th><th>Web Address</th><th>Email Address</th><tr>";
$query = "SELECT * FROM seller";
$resultset = $conn->query($query);

while ($seller = $resultset->fetch()) 
{
	
	echo "<tr>";
	echo "<td>".$seller["id"]."</td>";
	echo "<td>".$seller["NAME"]."</td>";
    echo "<td>".$seller["web"]."</td>";
    echo "<td>".$seller["email"]."</td>";
	echo "</tr>";
}
echo "</table>";

//function_product table
echo "<table>";
echo "<tr><th>Function Id</th><th>Product Id</th><tr>";
$query = "SELECT * FROM pfunction_product";
$resultset = $conn->query($query);

while ($pfunction_product = $resultset->fetch()) 
{
	
	echo "<tr>";
	echo "<td>".$pfunction_product["Pfunction_id"]."</td>";
	echo "<td>".$pfunction_product["product_id"]."</td>";
	echo "</tr>";
}
echo "</table>";
        
//product_seller table
echo "<table>";
echo "<tr><th>Product ID</th><th>Seller Id</th><tr>";
$query = "SELECT * FROM productct_seller";
$resultset = $conn->query($query);

while ($productct_seller = $resultset->fetch()) 
{
	
	echo "<tr>";
	echo "<td>".$productct_seller["product_id"]."</td>";
	echo "<td>".$productct_seller["seller_id"]."</td>";
	echo "</tr>";
}
echo "</table>";
        
//product_ingredients table
        echo "<table>";
echo "<tr><th>Product ID</th><th>Ingredient Id</th><tr>";
$query = "SELECT * FROM product_ingredients";
$resultset = $conn->query($query);

while ($product_ingredients = $resultset->fetch()) 
{
	
	echo "<tr>";
	echo "<td>".$product_ingredients["product_id"]."</td>";
	echo "<td>".$product_ingredients["ingredients_id"]."</td>";
	echo "</tr>";
}
echo "</table>";
?>

 	</body>
 	</html>