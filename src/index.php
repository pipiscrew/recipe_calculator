<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="referrer" content="no-referrer">

	<title>PipisCrew.Recipe Calculator</title>

	<!-- Bootstrap core CSS -->
	<link href="assets/bootstrap.min.css" rel="stylesheet">

	<!-- scripts
	<script type='text/javascript' src="js/jquery-1.10.2.min.js"></script>
	<script type='text/javascript' src="assets/bootstrap.min.js"></script>
	 -->

	<style>
		.form-group {
			margin-bottom: 5px;
		}
		.opac1ty { opacity: 0.5; }
		.d0t {border: 2px dotted;}
	</style>

	<!-- context menu -->
	<style>
		#contextMenu {
			position: absolute;
			background-color: white;
			border: 1px solid #ccc;
			display: none; 
			z-index: 1000;
		}
		#contextMenu ul {
			list-style-type: none;
			padding: 0;
			margin: 0;
		}
		#contextMenu li {
			padding: 8px 12px;
			cursor: pointer;
		}
		#contextMenu li:hover {
			background-color: #f0f0f0;
		}
	</style>

	<script type="text/javascript">
	</script>

</head>
<body style="padding: 20px;">
	<div class="container-fluid" id='ingredients' >
		<div class="row">
			<div class="col-md-2">
				<div class='form-group'>
					<label>Product :</label>
					<select id='ingredient1' class='form-control' onchange='GetIngredients(event)' placeholder='gr'></select>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>FAT :</label>
					<input id='fat1' title=' per 100gr ' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Carbs :</label>
					<input id='carb1' title=' per 100gr ' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Protein :</label>
					<input id='protein1' title=' per 100gr ' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Salt :</label>
					<input id='salt1' title=' per 100gr ' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Fiber :</label>
					<input id='fiber1' title=' per 100gr ' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label class="opac1ty">Saturated :</label>
					<input id='saturated1' title=' per 100gr ' class='opac1ty form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label class="opac1ty">Sugar :</label>
					<input id='sugar1' title=' per 100gr ' class='opac1ty form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label title=' this is the weight summation of FAT / CARBS / PROTEIN / SALT / FIBER per 100gr'>Sum :</label>
					<input id='sum1' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Grams used :</label>
					<input id='amount1' class='form-control' onchange='MaterializePerAmount_onchange(event)' placeholder='gr'>
				</div>
			</div>
		</div>
	</div>
	
	<!-- <div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1">
				<div class='form-group'>
					<label>Total weight :</label>
					<input id='recipeTotalGrams' class='form-control' placeholder='gr' readonly>
				</div>
			</div>
			
		</div>
	</div> -->

	<div class="container-fluid" id='countingredients'>
		<div class="row">
			<div class="col-md-2">
				<div class='form-group'>
					<label id='recipeLabel' style="color:red;">Recipe :</label>
					<select id='recipes' class='form-control' onchange='GetRecipeDetails(event)' placeholder='gr'></select>
				</div>
			</div>
			<div class="col-md-1">
				<div class='form-group'>
					<label>FAT :</label>
					<input id='countfat1' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Carbs :</label>
					<input id='countcarb1' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Protein :</label>
					<input id='countprotein1' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Salt :</label>
					<input id='countsalt1' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label>Fiber :</label>
					<input id='countfiber1' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label class="opac1ty">Saturated :</label>
					<input id='countsaturated1' class='opac1ty form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<label class="opac1ty">Sugar :</label>
					<input id='countsugar1' class='opac1ty form-control' placeholder='gr' readonly>
				</div>
			</div>
		</div>
	</div>

	<div class="container-fluid" id='totalingredients'>
		<div class="row">
			<div class="col-md-2"><strong>Totals :</strong></div>
			<div class="col-md-1">
					<input id='totalfat' class='d0t form-control' placeholder='gr' readonly>
			</div>

			<div class="col-md-1">
				<input id='totalcarb' class='d0t form-control' placeholder='gr' readonly>
			</div>

			<div class="col-md-1">
				<input id='totalprotein' class='d0t form-control' placeholder='gr' readonly>
			</div>

			<div class="col-md-1">
				<input id='totalsalt' class='d0t form-control' placeholder='gr' readonly>
			</div>

			<div class="col-md-1">
				<input id='totalfiber' class='d0t form-control' placeholder='gr' readonly>
			</div>

			<div class="col-md-1">
				<input id='totalsaturated' class='opac1ty form-control' placeholder='gr' readonly>
			</div>

			<div class="col-md-1">
				<input id='totalsugar' class='opac1ty form-control' placeholder='gr' readonly>
			</div>
		</div>
	</div>

	<div class="container-fluid" id='percentageingredients' style="margin-top:5px">
		<div class="row">
			<div class="col-md-2"><strong>Percentage :</strong></div>
			<div class="col-md-1">
				<h3><span id='percefat' class="label label-primary"></span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='percecarb' class="label label-primary"></span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='perceprotein' class="label label-primary"></span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='percesalt' class="label label-primary"></span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='percefiber' class="label label-primary"></span></h3>
			</div>

			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1"></div>
			<div class="col-md-1">
				<div class='form-group'>
					<label>Total weight :</label>
					<input id='recipeTotalGrams' class='form-control' placeholder='gr' readonly>
				</div>
			</div>
			
		</div>
			<!-- <div class="col-md-1">
				<h3><span id='percesaturated' class="label label-primary">Primary</span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='percesugar' class="label label-primary">Primary</span></h3>
			</div> -->
		</div>
	</div>

	<div class="container-fluid" id='portioningredients'>
		<div class="row">
			<div class="col-md-2">
				<div class='form-group'>
					<label>Portion weight (gr) :</label>
					<input id='portionWeight' onchange="ConvertPortionNutrition()" class='form-control' placeholder='gr'>
				</div>
			</div>
			<div class="col-md-1">
				<h3><span id='portionfat' class="label label-default"></span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='portioncarb' class="label label-default"></span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='portionprotein' class="label label-default"></span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='portionsalt' class="label label-default"></span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='portionfiber' class="label label-default"></span></h3>
			</div>
		</div>
			<!-- <div class="col-md-1">
				<h3><span id='portionsaturated' class="label label-primary">Primary</span></h3>
			</div>

			<div class="col-md-1">
				<h3><span id='portionsugar' class="label label-primary">Primary</span></h3>
			</div> -->
		</div>
	</div>


<?php
	if (isset($_SESSION['id'])) {
?>

<!-- NEW RECIPES MODAL [START] -->
<dialog id="recipeModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="CloseRecipeModal()">
					&times;
				</button>
				<h4 class="modal-title" id='lblTitle_RECIPES'>New</h4>
			</div>
			<div class="modal-body">
				<form id="formRECIPES" role="form" method="post" action="api.php" target="_blank">

				<input type="hidden" id="action" name="action" value="SaveRecipe"/>

				<div class='form-group'>
					<label>title :</label>
					<input id="title" name='title' class='form-control' placeholder='title'>
				</div>
				
				<div class='form-group'>
					<label>product1 :</label>
					<select id="product1" name='product1' class='form-control'></select>
				</div>

				<div class='form-group'>
					<label>product1_amount :</label>
					<input id="product1_amount" name='product1_amount' class='form-control' placeholder='product1_amount'>
				</div>

				<div class='form-group'>
					<label>product2 :</label>
					<select id="product2" name='product2' class='form-control'></select>
				</div>

				<div class='form-group'>
					<label>product2_amount :</label>
					<input id="product2_amount" name='product2_amount' class='form-control' placeholder='product2_amount'>
				</div>
			
				<div class='form-group'>
					<label>product3 :</label>
					<select id="product3" name='product3' class='form-control'></select>
				</div>

				<div class='form-group'>
					<label>product3_amount :</label>
					<input id="product3_amount" name='product3_amount' class='form-control' placeholder='product3_amount'>
				</div>

				<div class='form-group'>
					<label>product4 :</label>
					<select id="product4" name='product4' class='form-control'></select>
				</div>

				<div class='form-group'>
					<label>product4_amount :</label>
					<input id="product4_amount" name='product4_amount' class='form-control' placeholder='product4_amount'>
				</div>

				<div class='form-group'>
					<label>product5 :</label>
					<select id="product5" name='product5' class='form-control'></select>
				</div>

				<div class='form-group'>
					<label>product5_amount :</label>
					<input id="product5_amount" name='product5_amount' class='form-control' placeholder='product5_amount'>
				</div>

				<div class='form-group'>
					<label>product6 :</label>
					<select id="product6" name='product6' class='form-control'></select>
				</div>

				<div class='form-group'>
					<label>product6_amount :</label>
					<input id="product6_amount" name='product6_amount' class='form-control' placeholder='product6_amount'>
				</div>

				<div class='form-group'>
					<label>product7 :</label>
					<select id="product7" name='product7' class='form-control'></select>
				</div>

				<div class='form-group'>
					<label>product7_amount :</label>
					<input id="product7_amount" name='product7_amount' class='form-control' placeholder='product7_amount'>
				</div>

				<div class='form-group'>
					<label>product8 :</label>
					<select id="product8" name='product8' class='form-control'></select>
				</div>

				<div class='form-group'>
					<label>product8_amount :</label>
					<input id="product8_amount" name='product8_amount' class='form-control' placeholder='product8_amount'>
				</div>

				<div class='form-group'>
					<label>url :</label>
					<input id="url" name='url' class='form-control' placeholder='url'>
				</div>

				<div class='form-group'>
					<label>comment :</label>
					<input id="comment" name='comment' class='form-control' placeholder='comment'>
				</div>

				<div class='form-group'>
					<label>daterec :</label>
					<input id="daterec" name='daterec' class='form-control' placeholder='daterec'>
				</div>

					<input name="recipesFORM_updateID" id="recipesFORM_updateID" style="display:none;">

					<div class="modal-footer">
						<button id="bntCancel_RECIPES" type="button" class="btn btn-default" onclick="CloseRecipeModal()" data-dismiss="modal">
							cancel
						</button>
						<button id="bntSave_RECIPES" class="btn btn-primary" type="submit" name="submit">
							save
						</button>
					</div>
                </form>
            </div><!-- End of Modal body -->
        </div><!-- End of Modal content -->
    </div><!-- End of Modal dialog -->
</dialog>
<!-- NEW RECIPES MODAL [END] -->


<!-- NEW PRODUCTS MODAL [START] -->
<dialog id="productModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="CloseProductModal()">
					&times;
				</button>
				<h4 class="modal-title" id='lblTitle_PRODUCTS'>New</h4>
			</div>
			<div class="modal-body">
				<form id="formPRODUCTS" role="form" method="post" action="api.php" target="_blank">

				<input type="hidden" id="action" name="action" value="SaveProduct"/>
			
				<div class='form-group'>
					<label>title :</label>
					<input id='ptitle' name='title' class='form-control' maxlength="9999" placeholder='title'>
				</div>
			
				<div class='form-group'>
					<label>fat :</label>
					<input id='fat' name='fat' class='form-control' maxlength="9999" placeholder='fat'>
				</div>

				<div class='form-group'>
					<label>carbs :</label>
					<input id='carbs' name='carbs' class='form-control' maxlength="9999" placeholder='carbs'>
				</div>

				<div class='form-group'>
					<label>protein :</label>
					<input id='protein' name='protein' class='form-control' maxlength="9999" placeholder='protein'>
				</div>
			
				<div class='form-group'>
					<label>salt :</label>
					<input id='salt' name='salt' class='form-control' maxlength="9999" placeholder='salt'>
				</div>
			
				<div class='form-group'>
					<label>fiber :</label>
					<input id='fiber' name='fiber' class='form-control' maxlength="9999" placeholder='fiber'>
				</div>
			
				<div class='form-group'>
					<label>saturated :</label>
					<input id='saturated' name='saturated' class='form-control' maxlength="9999" placeholder='saturated'>
				</div>
			
				<div class='form-group'>
					<label>sugar :</label>
					<input id='sugar' name='sugar' class='form-control' maxlength="9999" placeholder='sugar'>
				</div>
			
				<div class='form-group'>
					<label>prod_url :</label>
					<input id='prod_url' name='prod_url' class='form-control' maxlength="9999" placeholder='prod_url'>
				</div>
			
				<div class='form-group'>
					<label>buy_url :</label>
					<input id='buy_url' name='buy_url' class='form-control' maxlength="9999" placeholder='buy_url'>
				</div>

					<input name="productsFORM_updateID" id="productsFORM_updateID" class="form-control" style="display:none;">

					<div class="modal-footer">
						<button id="bntCancel_PRODUCTS" type="button" class="btn btn-default" onclick="CloseProductModal()" data-dismiss="modal">
							cancel
						</button>
						<button id="bntSave_PRODUCTS" class="btn btn-primary" type="submit" name="submit">
							save
						</button>
					</div>
                </form>
            </div><!-- End of Modal body -->
        </div><!-- End of Modal content -->
    </div><!-- End of Modal dialog -->
</dialog><!-- End of Modal -->
<!-- NEW PRODUCTS MODAL [END] -->

<div id="contextMenu">
    <ul>
        <li onclick="NewRecipe()">new recipe</li>
        <li onclick="EditRecipe()">edit selected recipe</li>
        <li>--</li>
		<li onclick="NewProduct()">new ingredient</li>
		<li onclick="EditProduct()">edit first ingredient</li>
    </ul>
</div>

<?php
	}
?>

<script>
//common function
function $(id) { return document.getElementById(id); }

function replaceAll(find, replace, str) {
  return str.replace(new RegExp(find, 'g'), replace);
}

///////////////////////////////////////////////////////////////////// SETUP UI
let ingredientTemplate = `<div class='row'>
			<div class='col-md-2'>
				<div class='form-group'>
					<select id='ingredient{x}' class='form-control'  onchange='GetIngredients(event)' placeholder='gr'></select>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='fat{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='carb{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='protein{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='salt{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='fiber{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='saturated{x}' class='opac1ty form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='sugar{x}' class='opac1ty form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='sum{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class='col-md-1'>
				<div class='form-group'>
					<input id='amount{x}' class='form-control' onchange='MaterializePerAmount_onchange(event)' placeholder='gr'>
				</div>
			</div>
		</div>`;

	
	let html = '';
	for (let i = 2; i < 9; i++) {
		html += ingredientTemplate.replaceAll('{x}', i);   //append
	}

	$('ingredients').insertAdjacentHTML('beforeend',  html);
	
let countTemplate = `		<div class="row">
<div class="col-md-2"> </div>
			<div class="col-md-1">
				<div class='form-group'>
					<input id='countfat{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<input id='countcarb{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<input id='countprotein{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<input id='countsalt{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<input id='countfiber{x}' class='form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<input id='countsaturated{x}' class='opac1ty form-control' placeholder='gr' readonly>
				</div>
			</div>

			<div class="col-md-1">
				<div class='form-group'>
					<input id='countsugar{x}' class='opac1ty form-control' placeholder='gr' readonly>
				</div>
			</div>
		</div>`;
		
	let html2 = '';
	for (let i = 2; i < 9; i++) {
		html2 += countTemplate.replaceAll('{x}', i);
	}

	$('countingredients').insertAdjacentHTML('beforeend',  html2); //append
	///////////////////////////////////////////////////////////////////// SETUP UI

    ///////////////////////////////////////////////////////////////////// FILL COMBOS INGREDIENTS
	async function FillCombos(){
		let formData = new FormData();
		formData.append('action', 'GetProducts');

		const { response, error } = await fetchData(formData);

		if (response)
			populateSelects(response);
	}

	function populateSelects(data) { //also in modal selects ;) 
		const options = data.map(record => `<option value="${record.id}">${record.title}</option>`).join('');
		const selects = document.querySelectorAll('select');
		
		selects.forEach(select => {
			if (select.id!='recipes')
				select.innerHTML = options;
		});
	}

	FillCombos();
	///////////////////////////////////////////////////////////////////// FILL COMBOS INGREDIENTS

	///////////////////////////////////////////////////////////////////// INGREDIENTS COMBOS [OMG!] SELECTEDINDEX CHANGED
	async function GetIngredients(e)
	{
		let formData = new FormData();
		formData.append('action', 'GetIngredients');
		formData.append('id', e.target.value);
		
		const { response, error } = await fetchData(formData);

		if (response) {
			let comboIndex = e.target.id.slice(-1);

			if (response.length==0) {
				$('fat' + comboIndex).value = '';
				$('carb' + comboIndex).value = '';
				$('protein' + comboIndex).value = '';
				$('salt' + comboIndex).value = '';
				$('fiber' + comboIndex).value = '';
				$('saturated' + comboIndex).value = '';
				$('sugar' + comboIndex).value = '';
				$('sum' + comboIndex).value = '';
				$('amount' + comboIndex).value = '';
				MaterializePerAmount(comboIndex, 0); //wipe out counts on UI + total weight
			} else {				
				$('fat' + comboIndex).value = response[0].fat;
				$('carb' + comboIndex).value = response[0].carbs;
				$('protein' + comboIndex).value = response[0].protein;
				$('salt' + comboIndex).value = response[0].salt;
				$('fiber' + comboIndex).value = response[0].fiber;
				$('saturated' + comboIndex).value = response[0].saturated;
				$('sugar' + comboIndex).value = response[0].sugar;

				$('sum' + comboIndex).value = (Number(response[0].fat) + Number(response[0].carbs) + Number(response[0].protein) + Number(response[0].salt) + Number(response[0].fiber)).toFixed(2);
				$('amount' + comboIndex).focus();
				MaterializePerAmount(comboIndex, $('amount' + comboIndex).value); //recalculate the row (in case already filled and user change product)

				// $('sum' + comboIndex).value = response[0].sum
				// $('amount' + comboIndex).value = response[0].amount
			}
		}
	}

	///////////////////////////////////////////////////////////////////// FILL COMBO RECIPES
	async function FillRecipes(){
		let formData = new FormData();
		formData.append('action', 'GetRecipes');

		const { response, error } = await fetchData(formData);

		if (response)
			$('recipes').innerHTML = response.map(record => `<option value="${record.id}">${record.title}</option>`).join('');
	}

	FillRecipes();
	///////////////////////////////////////////////////////////////////// FILL COMBO RECIPES

	///////////////////////////////////////////////////////////////////// ONCHANGE EVENT - OF AMOUNT INPUTBOXES
	function MaterializePerAmount_onchange(e){
		MaterializePerAmount(e.target.id.slice(-1), e.target.value);
	}

	function MaterializePerAmount(rowIndex, amountValue){
		$('countfat' + rowIndex).value = ((Number($('fat' + rowIndex).value) / 100) *  Number(amountValue)).toFixed(2);
		$('countcarb' + rowIndex).value = ((Number($('carb' + rowIndex).value) / 100) *  Number(amountValue)).toFixed(2);
		$('countprotein' + rowIndex).value = ((Number($('protein' + rowIndex).value) / 100) *  Number(amountValue)).toFixed(2);
		$('countsalt' + rowIndex).value = ((Number($('salt' + rowIndex).value) / 100) *  Number(amountValue)).toFixed(2);
		$('countfiber' + rowIndex).value = ((Number($('fiber' + rowIndex).value) / 100) *  Number(amountValue)).toFixed(2);
		$('countsaturated' + rowIndex).value = ((Number($('saturated' + rowIndex).value) / 100) *  Number(amountValue)).toFixed(2);
		$('countsugar' + rowIndex).value = ((Number($('sugar' + rowIndex).value) / 100) *  Number(amountValue)).toFixed(2);
		RecipeTotalGrams();
	}

	function RecipeTotalGrams(){
		let sum = 0;

		for (let i = 1; i <= 8; i++) {
			
			if ($(`ingredient${i}`).value == 0) // ingredient must be selected
				continue;

			const value = $(`amount${i}`).value;
			
			const number = parseFloat(value);
			if (!isNaN(number)) {
				sum += number;
			}
		}

		$('recipeTotalGrams').value = sum.toFixed(2);
		RecipeTotalIngredients();
		ConvertTotals2Percentages();
		ConvertPortionNutrition();
	}

	function RecipeTotalIngredients(){ //sum on 'total' HTMLelements by the 'count' HTMLelements
		let sum = 0;

		let g = ['countfat', 'countcarb', 'countprotein', 'countsalt', 'countfiber', 'countsaturated', 'countsugar'];
		for (let arrElement = 0; arrElement < g.length; arrElement++) {
			sum=0;

			for (let i = 1; i <= 8; i++) {
				const value = $(g[arrElement] + i).value;

				const number = parseFloat(value);
				if (!isNaN(number)) {
					sum += number;
				}
			}

			$('total' + g[arrElement].replace('count', '')).value = sum.toFixed(2);
		}
	}

	function ConvertTotals2Percentages(){ //flip grams to percentages by 'total' HTMLelements
		let amount = 0;
		let sum = 0;
		let totalGrams = Number($('recipeTotalGrams').value);

		let g = ['totalfat', 'totalcarb', 'totalprotein', 'totalsalt', 'totalfiber'];//, 'totalsaturated', 'totalsugar'];
		for (let arrElement = 0; arrElement < g.length; arrElement++) {
			amount=0;

			const value = $(g[arrElement]).value;

			const number = parseFloat(value);

			if (!isNaN(number) && number>0) {
				amount = ((number/totalGrams) * 100);
				sum += amount
			} 

			$('perce' + g[arrElement].replace('total', '')).innerHTML = amount.toFixed(2) + '%';
		}
	}

	function ConvertPortionNutrition(){
		let amount = 0;
		let totalGrams = Number($('recipeTotalGrams').value);
		let portionGrams = Number($('portionWeight').value);

		let g = ['totalfat', 'totalcarb', 'totalprotein', 'totalsalt', 'totalfiber'];//, 'totalsaturated', 'totalsugar'];
		for (let arrElement = 0; arrElement < g.length; arrElement++) {
			amount=0;

			const value = $(g[arrElement]).value;

			const number = parseFloat(value);

			if (!isNaN(number) && number>0) {
				amount = ((number/totalGrams) * portionGrams);
			} 

			$('portion' + g[arrElement].replace('total', '')).innerHTML = amount.toFixed(2) + 'gr';
		}
	}


	///////////////////////////////////////////////////////////////////// RECIPE COMBO FUNCTIONS
	async function GetRecipeDetails(e){ //event on change
		let formData = new FormData();
		formData.append('action', 'GetRecipeDetails');
		formData.append('id', e.target.value);
		
		const { response, error } = await fetchData(formData);

		if (response) {
			$('amount1').value = response[0].product1_amount;
			$('amount2').value = response[0].product2_amount;
			$('amount3').value = response[0].product3_amount;
			$('amount4').value = response[0].product4_amount;
			$('amount5').value = response[0].product5_amount;
			$('amount6').value = response[0].product6_amount;
			$('amount7').value = response[0].product7_amount;
			$('amount8').value = response[0].product8_amount;
			setSelectValue('ingredient1', response[0].product1);
			setSelectValue('ingredient2', response[0].product2);
			setSelectValue('ingredient3', response[0].product3);
			setSelectValue('ingredient4', response[0].product4);
			setSelectValue('ingredient5', response[0].product5);
			setSelectValue('ingredient6', response[0].product6);
			setSelectValue('ingredient7', response[0].product7);
			setSelectValue('ingredient8', response[0].product8);
		}
	}		
	
	function setSelectValue(element, value) {
		//required like this, so SELECT elements to raise onchange by itself (aka call GetIngredients)
		var selectElement = $(element);
		selectElement.value = value; 

		// Create a new event
		var event = new Event('change', {
			bubbles: true,
			cancelable: true
		});

		// Dispatch the event
		selectElement.dispatchEvent(event);
	}

	///////////////////////////////////////////////////////////////////// COMMON FUNCTIONS
	async function fetchData(formdata) {
		const requestOptions = {
			method: "POST",
			cache: 'no-cache',
			body: formdata
		};

		try {
			const response = await fetch('api.php', requestOptions);
			const data = await response.json();
			return { response: data, error: null };
		} catch (error) {
			alert('Error fetching data:', error);
		}
	}


<?php
	if (isset($_SESSION['id'])) {
?>
///////////////////////////////////////////////////////////////////// CONTEXT MENU TO 'RECIPES' HTML LABEL ELEMENT (see css/div "contextMenu" )

	const contextMenu = document.getElementById('contextMenu');
	const recipeLabel = document.getElementById('recipeLabel');

	// Show the context menu only when right-clicking on the label
	recipeLabel.addEventListener('contextmenu', (event) => {
		event.preventDefault(); // Prevent the default context menu
		
		contextMenu.style.display = 'block';
		contextMenu.style.left = `${event.pageX}px`;
		contextMenu.style.top = `${event.pageY}px`;
	});

	// Hide the context menu when clicking elsewhere
	document.addEventListener('click', () => {
		contextMenu.style.display = 'none';
	});

///////////////////////////////////////////////////////////////////// RECIPE -CONTEXT MENU- OPERATIONS 
	function NewRecipe(){
		$("recipesFORM_updateID").value = '';
		$('formRECIPES').reset();
		$('lblTitle_RECIPES').innerHTML = "New";
		$("recipeModal").showModal();
	}

	async function EditRecipe(){
		$('formRECIPES').reset();

		let formData = new FormData();
		formData.append('action', 'GetRecipeDetails');
		formData.append('id', $('recipes').value);

		const { response, error } = await fetchData(formData);

		if (response)
		{						
			if (response!='null')
			{
				$("recipesFORM_updateID").value = (response[0].id);
				$('title').value = (response[0].title);
				$('product1').value = (response[0].product1);
				$('product1_amount').value = (response[0].product1_amount);
				$('product2').value = (response[0].product2);
				$('product2_amount').value = (response[0].product2_amount);
				$('product3').value = (response[0].product3);
				$('product3_amount').value = (response[0].product3_amount);
				$('product4').value = (response[0].product4);
				$('product4_amount').value = (response[0].product4_amount);
				$('product5').value = (response[0].product5);
				$('product5_amount').value = (response[0].product5_amount);
				$('product6').value = (response[0].product6);
				$('product6_amount').value = (response[0].product6_amount);
				$('product7').value = (response[0].product7);
				$('product7_amount').value = (response[0].product7_amount);
				$('product8').value = (response[0].product8);
				$('product8_amount').value = (response[0].product8_amount);
				$('url').value = (response[0].url);
				$('comment').value = (response[0].comment);
				$('daterec').value = (response[0].daterec);

				$('lblTitle_RECIPES').innerHTML = "Edit";

				$("recipeModal").showModal();
			}
		}
	}

	function CloseRecipeModal(){
		$('recipeModal').close();
	}

///////////////////////////////////////////////////////////////////// PRODUCT -CONTEXT MENU- OPERATIONS 
	function NewProduct(){
		$("productsFORM_updateID").value = '';
		$('formPRODUCTS').reset();
		$('lblTitle_RECIPES').innerHTML = "New";
		$("productModal").showModal();
	}

	async function EditProduct(){
		$('formPRODUCTS').reset();

		let formData = new FormData();
		formData.append('action', 'GetIngredients');
		formData.append('id', $('ingredient1').value);

		const { response, error } = await fetchData(formData);

		if (response)
		{						
			if (response!='null')
			{
				$("productsFORM_updateID").value = (response[0].id);
				$('ptitle').value = (response[0].title);
				$('fat').value = (response[0].fat);
				$('carbs').value = (response[0].carbs);
				$('protein').value = (response[0].protein);
				$('salt').value = (response[0].salt);
				$('fiber').value = (response[0].fiber);
				$('saturated').value = (response[0].saturated);
				$('sugar').value = (response[0].sugar);
				$('prod_url').value = (response[0].prod_url);
				$('buy_url').value = (response[0].buy_url);

				$('lblTitle_PRODUCTS').innerHTML = "Edit";

				$("productModal").showModal();
			}
		}
	}

	function CloseProductModal(){
		$('productModal').close();
	}

<?php 
	}
?>

</script>


</body>

</html>