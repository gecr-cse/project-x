<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines over all control of the error message
 * Created on : <Date of creation>
 * NOTICE:  All information contained herein is, and remains
 * the property of GEC Raipur CS Department. The intellectual and technical concepts contained
 * herein are originated as part Industry Orientation program.
 * Dissemination of this information or reproduction of this material
 * is restricted unless prior written permission is obtained
 * from GEC Raipur CS Department.
 */
-->
<?php
class Messages {	
	var $msgId;
	var $msgTypes = array('blue', 'orange', 'red', 'red', 'green');
	var $msgClass = 'messages';
	var $msgWrapper = "<div class='%s %s'><a href='#' class='closeMessage'></a>\n%s</div>\n";
	var $msgBefore = '<p>';
	var $msgAfter = "</p>\n";
	public function __construct() {
	
		// Generate a unique ID for this user and session
		$this->msgId = md5(uniqid());
		
		// Create the session array if it doesnt already exist
		if( !array_key_exists('flash_messages', $_SESSION) ) $_SESSION['flash_messages'] = array();
		
	}

	public function add($type, $message) {
		
		if( !isset($_SESSION['flash_messages']) ) return false;
		
		if( !isset($type) || !isset($message[0]) ) return false;

		// Replace any shorthand codes with their full version
		if( strlen(trim($type)) == 1 ) {
			$type = str_replace( array('h', 'i', 'w', 'e', 's'), array('help', 'info', 'warning', 'error', 'success'), $type );
		
		// Backwards compatibility...
		} elseif( $type == 'information' ) {
			$type = 'info';	
		}
		
		// Make sure it's a valid message type
		if( !in_array($type, $this->msgTypes) ) die('"' . strip_tags($type) . '" is not a valid message type!' );
		
		// If the session array doesn't exist, create it
		if( !array_key_exists( $type, $_SESSION['flash_messages'] ) ) $_SESSION['flash_messages'][$type] = array();
		
		$_SESSION['flash_messages'][$type][] = $message;
		
		return true;
		
	}
	public function display($type='all', $print=true) {
		$messages = '';
		$data = '';
		
		if( !isset($_SESSION['flash_messages']) ) return false;
		
		if( $type == 'g' || $type == 'growl' ) {
			$this->displayGrowlMessages();
			return true;
		}
		
		// Print a certain type of message?
		if( in_array($type, $this->msgTypes) ) {
			foreach( $_SESSION['flash_messages'][$type] as $msg ) {
				$messages .= $this->msgBefore . $msg . $this->msgAfter;
			}

			$data .= sprintf($this->msgWrapper, $this->msgClass, $type, $messages);
			
			// Clear the viewed messages
			$this->clear($type);
		
		// Print ALL queued messages
		} elseif( $type == 'all' ) {
			foreach( $_SESSION['flash_messages'] as $type => $msgArray ) {
				$messages = '';
				foreach( $msgArray as $msg ) {
					$messages .= $this->msgBefore . $msg . $this->msgAfter;	
				}
				$data .= sprintf($this->msgWrapper, $this->msgClass, $type, $messages);
			}
			
			// Clear ALL of the messages
			$this->clear();
		
		// Invalid Message Type?
		} else { 
			return false;
		}
		
		// Print everything to the screen or return the data
		if( $print ) { 
			echo $data; 
		} else { 
			return $data; 
		}
	}

	public function hasErrors() { return empty($_SESSION['flash_messages']['error']) ? false : true;	}

	public function hasMessages($type=null) {
		if( !is_null($type) ) {
			if( !empty($_SESSION['flash_messages'][$type]) ) return $_SESSION['flash_messages'][$type];	
		} else {
			foreach( $this->msgTypes as $type ) {
				if( !empty($_SESSION['flash_messages']) ) return true;	
			}
		}
		return false;
	}

	public function __toString() { return $this->hasMessages();	}

	public function clear($type='all') { 
		if( $type == 'all' ) {
			unset($_SESSION['flash_messages']); 
		} else {
			unset($_SESSION['flash_messages'][$type]);
		}
		return true;
	}

	public function __destruct() {
		//$this->clear();
	}
	
} // end class
?>