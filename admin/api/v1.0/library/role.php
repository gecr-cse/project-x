<?php
    class Role extends Application{
        protected $permissions;

        protected function __contruct(){
            $this->permissions=array();

        }

        public function getRolePerms($role_id) {
            $role = new Role();
            $sql = "SELECT t2.perm_desc FROM sm_role_perm as t1
                JOIN sm_permissions as t2 ON t1.perm_id = t2.perm_id
                WHERE t1.role_id = ".$role_id;
            $result=$this->executeQuery($sql);
            foreach($result as $row){
                $role->permissions[$row["perm_desc"]] = true;
            }

            return $role->permissions;
        }
        public function hasPerm($permissions,$perm) {
            if(isset($permissions[$perm])){
                return 1;
            }else{
                return 0;
            }
        }
    }
?>