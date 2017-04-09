<?php

			$text=file_get_contents("like_count.txt");
			$text=$text-1;
			echo " this is $text";
			$file=fopen("like_count.txt","w");	
			fwrite($file,$text);
			
?>