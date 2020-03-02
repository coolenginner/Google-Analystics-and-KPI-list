<?php
if (!function_exists('random_password')) {

	function random_password($length=6) 
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$password = array(); 
		$alpha_length = strlen($alphabet) - 1; 
		for ($i = 0; $i < $length; $i++) 
		{
			$n = rand(0, $alpha_length);
			$password[] = $alphabet[$n];
		}
		return implode($password); 
	}
}

if (!function_exists('format_Date')) {

    function format_Date($date = '',$format='jS M, Y H:i:s',$timestamp=FALSE) {
    	$new_date='';
        if ($date != '') {
        	if($timestamp==FALSE){
        		$date = strtotime($date);
        	}
            $new_date = date($format,$date);
        }
        return $new_date;
    }

}


?>