<?php

class Rating extends DB {

	protected $table = 'ratings';

	function store($vote, $idTT){

		$query = "INSERT INTO `ratings`(`id`, `idTT`, `vote`) VALUES (null, $idTT, $vote)";

		if(mysqli_query($this->conn, $query)){
			return true;
		}
		return false;
	}

	function getVote($idTT){
		$query = "SELECT vote FROM $this->table WHERE idTT = $idTT";

		$result = mysqli_query($this->conn, $query);
		$sumVote = 0; $i = 0; $vote = 3;
		if($result){
			if(mysqli_num_rows($result) > 0){
				
				while($row = mysqli_fetch_assoc($result)){
					$sumVote += $row['vote'];
					$i++;
				}
			}
		}
		
		if($i != 0){
			$intVote = intval($sumVote/$i);
			$avarVote = round($sumVote/$i, 1);
			$residual = (float)($avarVote - $intVote);

			if($sumVote > 0 && $avarVote <= 3){
				$vote = 3;
			}elseif($sumVote > 0 && $residual < 0.5){
				$vote = $intVote;
			}elseif($sumVote > 0){
				$vote = $intVote + 1;
			}
		}
		

		return $vote;
	}
}