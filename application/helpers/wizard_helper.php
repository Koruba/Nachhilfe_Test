<?php
if ( ! defined('BASEPATH')) exit('Direkter Scriptzugriff nicht erlaubt'); 

/**
	 * Funktion fill_template
	 * 
	 * Befüllt die Marker für das Template mit Inhalt
	 * 
	 * Parameter: 
	 *		file: true->im Template wird ein View-File geladen, false->direkte Ausgabe den content-Variable im Template
	 *		content: Name des View-Files oder HTML-Inhalt zur Anzeige im Template
	 *		data: 
	 *		navi:
	 *		login:
	 *		head:
	 *		schulname:
	 * 
	 * Rückgabe : nichts
	 */
 
if ( ! function_exists('fill_template')){ 

	function fill_template($file,$content,$data,$navi,$login,$data_login,$head,$data_header,$schulname,$footer,$data_footer)
	{
		$ci=& get_instance();
		
		$ci->template->write('title','');
		
		
		if ($schulname != '')	
			$ci->template->write('schulname','Berufskolleg Uerdingen'); 
			
		if ($navi != '')	
			$ci->template->write('navi',$navi);
		
/*		
		if ($login != '')	
			$ci->template->write_view('login',$login,$data_login);
			
		if ($head != '')	
			$ci->template->write_view('head',$head,$data_header);
		*/
		if($file==true){
			$ci->template->write_view('content',$content,$data);
		}else{
			$ci->template->write('content',$content);
			
		}
		/*
		if ($footer !='')
			$ci->template->write_view('footer',$footer,$data_footer);
		*/
		$ci->template->render();
	}
}
	


if ( ! function_exists('kachel_navigation')){ 

	function kachel_navigation($arr,$index_id,$index_bez,$klasse,$meldung){
		$i=0;
		$ausgabe="";
		$max_spalte=5;
		$anz=count($arr);

		if ( ! empty($arr[0])){
			$ausgabe.= "<table align='center' border='1'><tr>";
			foreach($arr as $a){
				if ($i%$max_spalte==0 && $i>0){
					$ausgabe.= "</tr><tr>";
				}
				$ausgabe.= "<td id='".$a[$index_id]."' class='".$klasse."' width='220' height='50' style='vertical-align:middle;text-align:center'>".$a["$index_bez"]."</td>";
				$i++;
			}
			
			if (ceil($anz/$max_spalte)>1){
				$rest=ceil($anz/$max_spalte)*$max_spalte-$anz;
				for($x=0;$x<$rest;$x++)
					$ausgabe.= "<td>&nbsp;</td>";
			}
			$ausgabe.= "</tr></table>";		
		}else{
			$ausgabe.= "<table align='center' class='tab_ohne_border' width='500'><tr>";
			$ausgabe.= "<td width='40' align='center'><img src='".base_url()."public/images/hinweis.png'</td><td class='hinweis'>".$meldung."</td></tr>";	
			$ausgabe.= "</table>";
		}
		return $ausgabe;	
	}
}



if ( ! function_exists('kachel_auswahl')){ 

	function kachel_auswahl($arr,$index_id,$index_bez,$klasse,$meldung){
		$i=0;
		$ausgabe="";
		$max_spalte=5;
		$anz=count($arr);


		if ( ! empty($arr[0])){
			$ausgabe.= "<table id='selectable' align='center' border='1'><tr>";
			foreach($arr as $a){
				if ($i%$max_spalte==0 && $i>0){
					$ausgabe.= "</tr><tr>";
				}
				$ausgabe.= "<td id='".$a[$index_id]."' class='".$klasse."' width='220' height='50' style='vertical-align:middle;text-align:center'>".$a["$index_bez"]."</td>";
				$i++;
			}
			
			if (ceil($anz/$max_spalte)>1){
				$rest=ceil($anz/$max_spalte)*$max_spalte-$anz;
				for($x=0;$x<$rest;$x++)
					$ausgabe.= "<td>&nbsp;</td>";
			}
			$ausgabe.= "</tr></table>";		
		}else{
			$ausgabe.= "<table align='center' border='1' width='700'><tr>";
			$ausgabe.= "<td width='40' align='center'><img src='".base_url()."public/images/hinweis.png'</td><td class='red'>".$meldung."</td></tr>";	
			$ausgabe.= "</table>";
		}
		return $ausgabe;	
	}
}


/* Ende von Datei wizard_helper.php
   Location: ./application/helpers/wizard_helper.php*/