<?php

	// Exercice 1
	function getCode( $produit ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		return $code ;
	}
	
	// Exercice 2
	function getNom( $produit ){
		list( $code, $nom, $prixUnit , $promo ) = explode( ":" , $produit ) ;
		return $nom ;
	}
	
	// Exercice 3
	function estEnPromo( $produit ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		
		if( $promo == 0 ){
			return FALSE ;
		}
		else {
			return TRUE ;
		}
	}

	// Exercice 4	
	function estUnPetitPrix( $produit , $petitPrix ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		
		if( $prixUnit <= $petitPrix){
			return TRUE ;
		}
		else{
			return FALSE ;
		}
	}
	
	// Exercice 5
	function calculerPrixPromo( $produit ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		
		$prixUnit = $prixUnit / $promo ;
		return $prixUnit ;
		
	}
	
	// Exercice 6
	function genererListeHTML( $produit , $nomFichier = "" ){
		list( $code , $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		
		$html = <<<FIN_HTML
		
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Asla</title>
</head>
<body>
	<h1>$nom</h1>
	<ul>
		<li>Prix : $prixUnit €</li>
		<li>Promotion : $promo %</li>
	</ul>
</body>

FIN_HTML;
		
		if( $nomFichier != "" ){
			$dest = fopen( "$nomFichier.html" , "w" ) ;	# Ouverture du fichier en mode écriture
			fwrite( $dest , $html ) ;					# Écriture de la chaîne dans le fichier
			fclose( $dest ) ;							# Fermeture du fichier
		}
			
		return $html ;
	}


	// Exercice 7
	function genererTableHTML( $produit , $nomFichier = "" ){
		list( $code, $nom , $prixUnit , $promo ) = explode( ":" , $produit ) ;
		
		$html = <<<FIN_HTML
		
<!DOCTYPE html>
<html lang ="fr">

<head>
	<meta charset="utf-8">
	<title>Asla</title>
</head>
<body>
	<table>
		<caption>Tarifs</caption>
		<thead>
			<tr>
				<th>$produit</th>
			</tr>
		</thead>
		
		<tbody>
			<tr>
				<td>$code</td>
				<td>$nom</td>
			
			</tr>
		</tbody>
	</table>
</body>
</html>
		
		
	}

	# Fonction principale
	function mainTest(){
		
		$produitTest1 = "178:Dentifrice fraise:15:10" ;
		$produitTest2 = "179:Dentifrice au sel marin:8.9:0" ;
		
		// Exercice 1
		echo "\n1) -------------------------------------\n" ;
		
		$codeProduit1 = getCode( $produitTest1 ) ;
		echo "Code du produit 1 : $codeProduit1\n" ;
		
		$codeProduit2 = getCode( $produitTest2 ) ;
		echo "Code du produit 2 : $codeProduit2\n" ;
		
		
		// Exercice 2
		echo "\n2) -------------------------------------\n" ;
		
		$nomProduit1 = getNom( $produitTest1 ) ;
		echo "Nom du produit 1 : $nomProduit1\n" ;
		
		$nomProduit2 = getNom( $produitTest2 ) ;
		echo "Nom du produit 2 : $nomProduit2\n" ;
		
		// Exercice 3
		echo "\n3) -------------------------------------\n" ;
		
		if( estEnPromo( $produitTest1 ) == TRUE ){
			echo "Le produit $nomProduit1 est en promotion.\n" ;
		}
		else {
			echo "Le produit $nomProduit1 n'est pas en promotion.\n" ;
		}
		
		if( estEnPromo( $produitTest2 ) == TRUE ){
			echo "Le produit $nomProduit2 est en promotion.\n" ;
		}
		else {
			echo "Le produit $nomProduit2 n'est pas en promotion.\n" ;
		}
		
		// Exercice 4
		echo "\n4) -------------------------------------\n" ;
		
		if( estUnPetitPrix( $produitTest1 , 10 ) == TRUE ){
			echo "Le produit $nomProduit1 est proposé à un petit prix.\n" ;
		}
		else {
			echo "Le produit $nomProduit1 n'est pas proposé à un petit prix.\n" ;
		}
		
		if( estUnPetitPrix( $produitTest2 , 10 ) == TRUE ){
			echo "Le produit $nomProduit2 est proposé à un petit prix.\n" ;
		}
		else {
			echo "Le produit $nomProduit2 n'est pas proposé à un petit prix.\n" ;
		}
		
		// Exercice 5
		echo "\n5) -------------------------------------\n" ;
		
		if( estEnPromo( $produitTest1 ) == TRUE ){
			$prixPromo1 = calculerPrixPromo( $produitTest1 ) ;
			echo "Le produit $nomProduit1 est proposé au prix promotionnel de $prixPromo1 €\n" ;
		}
		else {
			echo "Pas de promotion pour le produit $nomProduit1 n'est pas en promotion.\n" ;
		}
		
		if( estEnPromo( $produitTest2 ) == TRUE ){
			$prixPromo2 = calculerPrixPromo( $produitTest2 ) ;
			echo "Le produit $nomProduit2 est proposé au prix promotionnel de $prixPromo2 €\n" ;
		}
		else {
			echo "Pas de promotion pour le produit $nomProduit2.\n" ;
		}
		
		// Exercice 6
		echo "\n6.a) -------------------------------------\n" ;
		$codeHTML = genererListeHTML( $produitTest1 ) ;
		echo "Code HTML généré :\n$codeHTML\n" ;
		
		echo "\n6.b) -------------------------------------\n" ;
		$codeHTML = genererListeHTML( $produitTest2 , "vueProduitListe" ) ;
		echo "Code HTML généré :\n$codeHTML\n" ;
		
		// Exercice 7
		echo "\n7.a) -------------------------------------\n" ;
		// Votre code ici
		
		echo "\n7.b) -------------------------------------\n" ;
		// Votre code ici
	}
	
	# Programme Principal
	mainTest() ;

?>
