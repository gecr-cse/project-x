<?php
class loginManager extends Application{


function run_select_Query($query)
{
  $response = array();
  $result = $this->executeQuery($query);
  return $result;
}

}
?>
