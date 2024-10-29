<?php

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