<?php

	function tempsPost($temps){
		if($temps < 60){
			$temps = date("s",$temps);
			if($temps == "1"){
				$temps .= ' seconde';
			}
			else{
				$temps .= ' secondes';
			}
			return $temps;
		}
		if($temps < 3600){
			$temps = date("i",$temps);
			if($temps == "1"){
				$temps .= ' minute';
			}
			else{
				$temps .= ' minutes';
			}
			return $temps;
		}
		if($temps < 216000){
			$temps = date("G",$temps);
			if($temps == "1"){
				$temps .= ' heure';
			}
			else{
				$temps .= ' heures';
			}
			return $temps;
		}
		if($temps < 5184000){
			$temps = date("j",$temps);
			if($temps == "1"){
				$temps .= ' jour';
			}
			else{
				$temps .= ' jours';
			}
			return $temps;
		}
		if($temps < 1892160000){
			$temps = date("y",$temps);
			return $temps.' ans';
		}
		else{
			return 'bien longtemps';
		}
	}