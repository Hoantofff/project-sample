<?php

function showComment($id){
    try{

        $sql = "
            SELECT 
                    c.id            as c_id,
                    c.content       as c_content,
                    c.date_comment  as c_date_comment,
                    u.image         as u_image,
                    u.full_name     as u_full_name,
                    p.id            as p_id

            FROM comment as c
            INNER JOIN products   as p    ON p.id     = c.product_id
            INNER JOIN users      as u    ON u.id     = c.user_id
            WHERE 
                p.id = :id
            ORDER BY c.id DESC
        ";

        
        $stmt = $GLOBALS['conn']->prepare($sql);
        
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll();

    }catch (\Exception $e){
        debug($e);
    }
}