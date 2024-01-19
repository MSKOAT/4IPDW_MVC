<!doctype html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>VOO : Catalogue des produits</title>
<!-- link rel="stylesheet" type="text/css" href="./VOO _ Catalogue des produits_files/catalogue.css" -->
<style>


</style>
</head>
<body>
<?php
// paramètres
$fileName = 'voo_database.csv';
$sep = "|";

// lecture fichier
$fh = fopen( $fileName, 'r' );

while( ! feof($fh) )
{
	$ligne = fgets($fh);
	// echo $ligne.'<BR>';
	$product_a[] = explode( $sep, trim($ligne) );
}
fclose($fh);
// var_dump($product_a);
?>

<form method="POST">
<h1>VOO : Catalogue des produits</h1>
<div class="search_bar">
<input type="text" name="search_string"><button name="button_search">
            Chercher dans le catalogue
        </button>
</div>
<div class="login">
		Votre prénom : <input type="text" name="login_firstname">
		Votre nom : <input type="text" name="login_name">
</div>
<div class="button_bar">
<button name="button_basket_add">
            Enregistrer mon panier
        </button><button name="button_basket_see">
            Voir mon panier
        </button><button name="button_buy">
            Acheter
        </button>
</div>

<?php
// affichage catalogue
foreach( $product_a as $line => $product )
{
	if( $line == 0 ) continue; // skip la ligne avec les titres
	?>
	<div class="produit">
		<div class="formule">
			<?=$product[0]?>
		</div>
		<ul>
			<?php
			$formule_title = array( 
				"",
				"Appels",
				"SMS",
				"Internet",
				"Volume",
				"Vitesse",
			);
			for( $i=1 ; $i<=5 ; $i++ )
			{
				if(empty($product[$i])) continue;
				echo <<< FORMULE
				<li>{$formule_title[$i]} : {$product[$i]}</li>
FORMULE;
			}
			?>
		</ul>
		<div><a target="_blank" href="<?=$product[6]?>">
			Plus d'info
		</a></div>
		<div>
			Ajouter au panier : <br>
			<div class="prix">A la pièce : 12 €
				<select name="basket[toudou][single]"><option></option>
				<option value="1">1</option>
				<option value="2">2</option></select>
			</div>
		</div>
		<div class="prix">Groupe de 6 : 60 € 
			<select name="basket[toudou][pack]"><option></option>
			<option value="1">1</option>
			<option value="2">2</option></select>
		</div>
	</div>
	<?php
}
?>
</form>

</body></html>