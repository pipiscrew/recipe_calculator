<?php

@session_start();

require_once ('general.php');

if (!isset($_POST['action'])){
	ReportJS(0, 'No valid parameter0!');
	exit;
}

$action = $_POST['action'];

if (!isset($_SESSION["id"])) {
	$allowedActions = ['GetProducts', 'GetIngredients', 'GetRecipes', 'GetRecipeDetails'];
	
	if (!in_array($action, $allowedActions)) {
		ReportJS(0, 'User is not logged in');
		exit;
	}
}

switch ($action) {
	case 'GetProducts' : //get products
		GetProducts();
		break;
	case 'GetIngredients': //get ingredients
		GetIngredients($_POST['id']);
		break;
	case 'GetRecipes' : //get recipes
		GetRecipes();
		break;
	case 'GetRecipeDetails' : //get GetRecipeDetails
		$id = isset($_POST['id']) ? $_POST['id'] : 0;

		GetRecipeDetails($id);
		break;
	case 'SaveRecipe':  //save record
		$id = isset($_POST['recipesFORM_updateID']) ? $_POST['recipesFORM_updateID'] : 0;

		SaveRecipe($id);
		break;
	case 'SaveProduct' : //save record
		$id = isset($_POST['productsFORM_updateID']) ? $_POST['productsFORM_updateID'] : 0;

		SaveProduct($id);
		break;
	default :
		ReportJS(0, 'No action defined!');
		exit;
}

//===========================================
//		get records
//===========================================
function GetProducts() {
	$db = new dbase();
	$db->connect_sqlite();

	$heads = $db->getSet("select id, title from products order by title",null);

	header("Content-Type: application/json", true);
    array_unshift($heads, array( 'title' => '', 'id' => 0)); //add record to array at 0 index
	echo json_encode($heads);
}

function GetIngredients($productID) {
	$db = new dbase();
	$db->connect_sqlite();

	$record = $db->getSet("select * from products where id=? order by title", array($productID));

	header("Content-Type: application/json", true);
	echo json_encode($record);
}

function GetRecipes() {
	$db = new dbase();
	$db->connect_sqlite();

	$heads = $db->getSet("select id, title from recipes order by title,daterec", null);

	header("Content-Type: application/json", true);
    array_unshift($heads, array( 'title' => '', 'id' => 0)); //add record to array at 0 index
	echo json_encode($heads);
}

function SaveRecipe($id){
    $db = new dbase();
    $db->connect_sqlite();

	if ( isset($id) && $id > 0 ) //update
	{
		$sql = "UPDATE recipes set title=:title, product1=:product1, product1_amount=:product1_amount, product2=:product2, product2_amount=:product2_amount, product3=:product3, product3_amount=:product3_amount, product4=:product4, product4_amount=:product4_amount, product5=:product5, product5_amount=:product5_amount, product6=:product6, product6_amount=:product6_amount, product7=:product7, product7_amount=:product7_amount, product8=:product8, product8_amount=:product8_amount, url=:url, comment=:comment, daterec=:daterec where id=:id";
		$stmt = $db->getConnection()->prepare($sql);
		$stmt->bindValue(':id' , $id);
	}
	else
	{
		$sql = "INSERT INTO recipes (title, product1, product1_amount, product2, product2_amount, product3, product3_amount, product4, product4_amount, product5, product5_amount, product6, product6_amount, product7, product7_amount, product8, product8_amount, url, comment, daterec) VALUES (:title, :product1, :product1_amount, :product2, :product2_amount, :product3, :product3_amount, :product4, :product4_amount, :product5, :product5_amount, :product6, :product6_amount, :product7, :product7_amount, :product8, :product8_amount, :url, :comment, :daterec)";
		$stmt = $db->getConnection()->prepare($sql);
	}
	
	$stmt->bindValue(':title' , $_POST['title']);
	$stmt->bindValue(':product1' , $_POST['product1']);
	$stmt->bindValue(':product1_amount' , $_POST['product1_amount']);
	$stmt->bindValue(':product2' , $_POST['product2']);
	$stmt->bindValue(':product2_amount' , $_POST['product2_amount']);
	$stmt->bindValue(':product3' , $_POST['product3']);
	$stmt->bindValue(':product3_amount' , $_POST['product3_amount']);
	$stmt->bindValue(':product4' , $_POST['product4']);
	$stmt->bindValue(':product4_amount' , $_POST['product4_amount']);
	$stmt->bindValue(':product5' , $_POST['product5']);
	$stmt->bindValue(':product5_amount' , $_POST['product5_amount']);
	$stmt->bindValue(':product6' , $_POST['product6']);
	$stmt->bindValue(':product6_amount' , $_POST['product6_amount']);
	$stmt->bindValue(':product7' , $_POST['product7']);
	$stmt->bindValue(':product7_amount' , $_POST['product7_amount']);
	$stmt->bindValue(':product8' , $_POST['product8']);
	$stmt->bindValue(':product8_amount' , $_POST['product8_amount']);
	$stmt->bindValue(':url' , $_POST['url']);
	$stmt->bindValue(':comment' , $_POST['comment']);
	$stmt->bindValue(':daterec' , $_POST['daterec']);
	
	if ($stmt->execute())
		ReportJSarray( array('code'=> 1, 'id'=> $db->getConnection()->lastInsertId()) );
	else 
		ReportJS(0, 'Error!');
}

function GetRecipeDetails($id){
	$db = new dbase();
	$db->connect_sqlite();

	$record = $db->getSet("select * from recipes where id=?", array($id));

	header("Content-Type: application/json", true);
	echo json_encode($record);
}


function SaveProduct($id){
    $db = new dbase();
    $db->connect_sqlite();

	if ( isset($id) && $id > 0 ) //update
	{
		$sql = "UPDATE products set title=:title, fat=:fat, carbs=:carbs, protein=:protein, salt=:salt, fiber=:fiber, saturated=:saturated, sugar=:sugar, prod_url=:prod_url, buy_url=:buy_url where id=:id";
		$stmt = $db->getConnection()->prepare($sql);
		$stmt->bindValue(':id' , $id);
	}
	else
	{
		$sql = "INSERT INTO products (title, fat, carbs, protein, salt, fiber, saturated, sugar, prod_url, buy_url) VALUES (:title, :fat, :carbs, :protein, :salt, :fiber, :saturated, :sugar, :prod_url, :buy_url)";
		$stmt = $db->getConnection()->prepare($sql);
	}
	
	$stmt->bindValue(':title' , $_POST['title']);
	$stmt->bindValue(':fat' , $_POST['fat']);
	$stmt->bindValue(':carbs' , $_POST['carbs']);
	$stmt->bindValue(':protein' , $_POST['protein']);
	$stmt->bindValue(':salt' , $_POST['salt']);
	$stmt->bindValue(':fiber' , $_POST['fiber']);
	$stmt->bindValue(':saturated' , $_POST['saturated']);
	$stmt->bindValue(':sugar' , $_POST['sugar']);
	$stmt->bindValue(':prod_url' , $_POST['prod_url']);
	$stmt->bindValue(':buy_url' , $_POST['buy_url']);
	
	if ($stmt->execute())
		ReportJSarray( array('code'=> 1, 'id'=> $db->getConnection()->lastInsertId()) );
	else 
		ReportJS(0, 'Error!');
}