<?php
	function uploader($date,$file)
	{
		$arry2;
		$array=explode("/",$date);
		$year=$array[0];
		$month=$array[1];
		if(!file_exists("pictures/".$year))
		{
			mkdir("pictures/".$year);
			mkdir("pictures/".$year."/".$month);
			$arry2=uploader_file($file,$year,$month);
			return $arry2;
		}
		else
		{
			if(!file_exists("pictures/".$year."/".$month))
			{
				mkdir("pictures/".$year."/".$month);
				$arry2=uploader_file($file,$year,$month);
				return $arry2;
			}
			else 
			{
				$arry2=uploader_file($file,$year,$month);
				return $arry2;
			}
			
		}
	}
	function uploader_file($file,$year,$month)
	{
		$arry1;
		$j=0;
		$i=0;
		
		while(!empty($file['name'][$i]))
		{
			$picname=$file['name'][$i];
			$array2=explode(".",$picname);
			$ext=end($array2);
			$new_name=rand().time().".".$ext;
			$from=$file['tmp_name'][$i];
			$to="pictures/".$year."/".$month."/".$new_name;
			move_uploaded_file($from,$to);
			$arry1[$j]=$to;
			$j++;
			$i++;
		}
		return $arry1;
		
		
	}