<?php
class manager extends Application{

    function checkMobileExistance($mobile_no){
        //echo
        $sql="SELECT * FROM `student` WHERE `mobile`='$mobile_no' AND `is_active`='yes'";
        return $this->executeQuery($sql);
    }
}
?>