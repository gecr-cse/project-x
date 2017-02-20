<?php

    class secureLogin{

        function __construct(){
            $this->sec_session_start();
            $this->role=new Role();
        }

        function sec_session_start() {
  /*          $session_name = 'PROJECT_SESSION';   // Set a custom session name
            $secure = true;
            // This stops JavaScript being able to access the session id.
            $httponly = true;
            // Forces sessions to only use cookies.
            if (ini_set('session.use_only_cookies', 1) === FALSE) {
                header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
                exit();
            }
            // Gets current cookies params.
            $cookieParams = session_get_cookie_params();
            session_set_cookie_params($cookieParams["lifetime"],
                $cookieParams["path"],
                $cookieParams["domain"],
                $secure,
                $httponly);
            // Sets the session name to the one set above.
*/
            session_start();

           // session_regenerate_id(true);    // regenerated the session, delete the old one.

        }

        function check_login($privilege=""){

            $privileges=array();
            $login=true;
            if (isset($_SESSION['ADMIN_USER_ID'],$_SESSION['ADMIN_USER_ROLE'],$_SESSION['LOGIN_SESSION'])) {

                $user_id = $_SESSION['ADMIN_USER_ID'];
                $login_string = $_SESSION['LOGIN_SESSION'];
                $user_role = $_SESSION['ADMIN_USER_ROLE'];
                $login=true;
                $privileges = $this->role->getRolePerms($user_role);
                if($privilege!="") {

                    $permission = $this->role->hasPerm($privileges, $privilege);
                    if ($permission != 1) {
                        header("Location:" . ADMIN_BASE_URL . "views/dashboard/index.php");
                        exit;
                    }
                }
                // Get the user-agent string of the user.
                $user_browser = $_SERVER['HTTP_USER_AGENT'];
/*
                if ($stmt = $mysqli->prepare("SELECT password
                                      FROM members
                                      WHERE id = ? LIMIT 1")) {
                    // Bind "$user_id" to parameter.
                    $stmt->bind_param('i', $user_id);
                    $stmt->execute();   // Execute the prepared query.
                    $stmt->store_result();

                    if ($stmt->num_rows == 1) {
                        // If the user exists get variables from result.
                        $stmt->bind_result($password);
                        $stmt->fetch();
                        $login_check = hash('sha512', $password . $user_browser);

                        if ($login_check == $login_string) {
                            // Logged In!!!!
                            */


                            /*
                        } else {
                            // Not logged in
                             $login=false;
                        }
                    } else {
                        // Not logged in
                         $login=false;
                    }
                } else {
                    // Not logged in
                     $login=false;
                }
                */
            } else {
                // Not logged in
                $login=false;
            }
            if($login==false){

               header("LOCATION:".LOGIN_PATH);
                exit;
            }else{
                return $privileges;
            }

        }

        function checkbrute($user_id) {
            /*TODO LATER TO CHECK NO OF ATTEMPTS DONE BY USER
            // Get timestamp of current time
            $now = time();

            // All login attempts are counted from the past 2 hours.
            $valid_attempts = $now - (2 * 60 * 60);

            if ($stmt = $mysqli->prepare("SELECT time
                             FROM login_attempts
                             WHERE user_id = ?
                            AND time > '$valid_attempts'")) {
                $stmt->bind_param('i', $user_id);

                // Execute the prepared query.
                $stmt->execute();
                $stmt->store_result();

                // If there have been more than 5 failed logins
                if ($stmt->num_rows > 5) {
                    return true;
                } else {
                    return false;
                }
            }
            */
        }
}
?>