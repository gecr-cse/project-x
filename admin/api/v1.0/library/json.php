<?php
class Json{
	function getJSONObject( $body ) {
		if(strlen($body)) {
			$jsonobj = json_decode($body); // Add second parameter as "true" in json_decode to get return value as array
			$jsonErrCode = json_last_error();
			if( $jsonErrCode == 0 ) {
				return $jsonobj;
			} else {
				$this->showErrorResponse($jsonErrCode, array("message" => "INVALID JSON"));
			}
		} else {
			$this->showErrorResponse(13, array("message" => "Empty data Input"));
		}
	}

	function showErrorResponse($errCode, $errMsg) {
		$errorResponse = array("statusCode" => $errCode, "statusDesc" => $errMsg);
		header("Content-Type:application/json");
		echo json_encode( $errorResponse );
		exit(0);
	}
}
?>