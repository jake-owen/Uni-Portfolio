	<!DOCTYPE HTML>
 	<html>
 	<head>
 	<title>Search Page</title>
 	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link href="../CIT2318/css/startbootstrap-creative-gh-pages/css/creative.min.css" rel="stylesheet" type="text/css">
 	</head>
 	<body>
 	<h1>Search</h1>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<label for="search">Search for a Suppliment by Name:</label>
<input type="text" name="search" placeholder="Enter a Search Term"id="search">
<input type="submit" name="submitBtn" value="Search"> 
</form>

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

//connect to the db
if(!isset($_POST['search']))
{
echo "<p></p>";
            exit;

}
        
else if($_POST['search']==""){
echo "You didn't enter a search term.";
exit;

}

/* search */
$searchTerm=$_POST['search'];

$stmt = $conn->prepare("SELECT name, id FROM product WHERE name LIKE :searchTerm");
$stmt->bindValue(':searchTerm','%'.$searchTerm.'%');
$stmt->execute();
		
while ($product = $stmt->fetch())
{
echo "<p>";
    echo "<a href='details.php?id=" . $product["id"] . "'>";
    echo $product["name"];
    echo "</a>";
    echo "</p>";
 

}

?>