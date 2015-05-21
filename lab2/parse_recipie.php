<?php
	require_once 'simplehtmldom_1_5/simple_html_dom.php';
	
	function initUrl($s){
		$html = new simple_html_dom();
		$html = file_get_html($_POST[$s]);
		return $html;
	}
	
	function close(&$html){
		$html->clear(); 
		unset($html);
	}
	
	function parsePovarenokTitle(&$html){			
		return $html->find('title', 0)->plaintext;
	}
	
	function parsePovarenokIngredients(&$html){	
		$ing = $html->find('div.recipe-ing', 0);
		$flag = true;
		$result = "";
		foreach ($ing->find('span[itemprop=name], span[itemprop=amount]') as $value){
			if ($value->getAttribute('itemprop') == 'amount'){
				$result .= (' - '. $value->plaintext . '<br>');
				$flag = true;
			} else {
				if ($flag == false){
					$result .= '<br>';
				}
				$result .=  $value->plaintext;
				$flag = false;
			}								
		}
		return $result;	
	}
	
	function parsePovarenokSteps(&$html){
		return $html->find('div.recipe-steps', 0);
	}
	
	function parseEdaTitle(&$html){		
		return $html->find('meta[property=twitter:title]', 0)->getAttribute('content');
	}
	
	function parseEdaIngredients(&$html){
		$ing = $html->find('div.print-ingredients', 0);
		$result = "";	
		foreach ($ing->find('td.name, td.amount') as $value){
			if ($value->getAttribute('class') == 'amount ingredient-measure-amount'){
				$result .= ' - ' . $value->plaintext . '<br>';
			} else {
				$result .= $value->plaintext;
			}
		}
		return $result;
	}
	
	function parseEdaImage(&$html){
		return $html->find('link[rel=image_src]', 0)->getAttribute('href');
	}
	
	function parseEdaSteps(&$html){
		$result = "";
		foreach($html->find('div.text') as $instruction){
				$result .= $instruction;
		} 		
		return $result;
	}
?>