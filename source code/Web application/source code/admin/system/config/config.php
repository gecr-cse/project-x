<!--
/*************************************************************************
 * Copyright (c) 2017 GEC CS Department
 * Author: <Name> <Sem>
 * Purpose : This page is defines database credentials
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

class Config {
    /*
      This function is used for define the Database Connection.
     */

    function dbValues() {
        return array(
            "HOST" => "localhost",
            "USERNAME" => "root",
            "PASSWORD" => "",
            "DATABASE" => "pa"
        );
    }

}
