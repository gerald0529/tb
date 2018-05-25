<?php
/*
设置数组
*/
function _config($cfg){
	
	foreach ($cfg as $key => $value) {
		$data[$value['code']]=$value['body'];
	}

return $data;
}

?>