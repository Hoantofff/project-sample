<?php

if(!function_exists('listAllForUser')){
    function listAllForUser(){
        try{
            $sql = "
                SELECT 
                        u.id                as u_id,
                        u.full_name         as u_full_name,
                        u.email             as u_email,
                        u.phone             as u_phone,
                        u.address           as u_address,
                        u.password          as u_password,
                        u.image             as u_image,
                        r.id                as r_id,
                        r.name              as r_name

                FROM users as u
                INNER JOIN role   as r    ON r.id     = u.role_id
                ORDER BY u_id DESC
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        }catch(\Exception $e){
            debug($e);
        }
    }
}

if(!function_exists('showOneForUser')){
    function showOneForUser($id){
        try{
            $sql = "
                SELECT 
                        u.id                as u_id,
                        u.full_name         as u_full_name,
                        u.email             as u_email,
                        u.phone             as u_phone,
                        u.address           as u_address,
                        u.password          as u_password,
                        u.role_id           as u_role_id,
                        u.image             as u_image,
                        r.name              as r_name

                FROM users as u
                    INNER JOIN role   as r    ON r.id     = u.role_id
                WHERE
                    u.id = :id
                LIMIT 1
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();

        }catch(\Exception $e){
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmail')) {
    function checkUniqueEmail($tableName, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName where email = :email LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':email', $email);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('checkUniqueEmailForUpdate')) {
    function checkUniqueEmailForUpdate($tableName,$id,$email)
    {
        try {

            $sql = "SELECT * FROM $tableName where email = :email AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('checkUniqueNameUser')) {
    function checkUniqueNameUser($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName where full_name = :name LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':name', $name);

            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('checkUniqueNameForUpdateUser')) {
    function checkUniqueNameForUpdateUser($tableName,$id,$name)
    {
        try {

            $sql = "SELECT * FROM $tableName where full_name = :name AND id <> :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':id', $id);
            
            $stmt->execute();

            $data = $stmt->fetch();

            return empty($data) ? true : false;
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
function showOneForUserByEmail($email){
    try{
        $sql = "
            SELECT 
                    u.id                as u_id,
                    u.full_name         as u_full_name,
                    u.email             as u_email,
                    u.phone             as u_phone,
                    u.address           as u_address,
                    u.password          as u_password,
                    u.image             as u_image,
                    u.role_id           as u_role_id,
                    r.name              as r_name
            FROM users as u
                INNER JOIN role as r ON r.id = u.role_id
            WHERE u.email = :email
            LIMIT 1
        ";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch();

    } catch(\Exception $e) {
        debug($e);
    }
    return false;
}



