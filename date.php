<?php

function ago($time)
{
	$time = strtotime($time);
	$diff_time = time() - $time;

	   if ($diff_time < 1) {
	   	return " a l'instanat ";
	   }

	   $sec = array(
	    31556926     => 'ans',
		2629743  => 'mois',
		86400       => 'jour',
		3600        => 'heure',
		60          =>  'minute',
		1           => 'seconde'
		 );

	      foreach($sec as $sec =>$value)
	      {
	      	$div = $diff_time /$sec;
	      	  if ($div >=1) {
	      	  	$time_ago = round($div);
	      	  	$time_type = $value;
	      	  	return 'il y a '.$time_ago.' '.$time_type;
	      	  }
	      }
}

?>