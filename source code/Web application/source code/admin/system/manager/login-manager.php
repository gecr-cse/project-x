<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines the SQL aspect of adding ,deleting, editing and viewing login
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
class loginManager extends Application{

    function checkExistence($username){
        echo
        $sql="SELECT * FROM `user_login` WHERE `user_name`='$username' AND `user_login`.`is_active`='yes'";
        return $this->executeQuery($sql);
    }

    function updatePassword($user_id,$pass1){
        $sql="UPDATE `user_login` SET `user_pass` = '$pass1' WHERE `user_login`.`user_id` = $user_id";
        return $this->updateQuery($sql);
    }
}
?>