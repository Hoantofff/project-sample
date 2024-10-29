<?php

if(!function_exists('listAllForproduct')){
    function listAllForProduct(){
        try{
            $sql = "
                SELECT 
                        p.id                as p_id,
                        p.title             as p_title,
                        p.price             as p_price,
                        p.discount          as p_discount,
                        p.description       as p_description,
                        p.created_at        as p_created_at,
                        p.updated_at        as p_updated_at,
                        p.view_count        as p_view_count,
                        p.quantity          as p_quantity,
                        p.weight            as p_weight,
                        p.image             as p_image,
                        c.id                as c_id,
                        c.name              as c_name

                FROM products as p
                INNER JOIN categories   as c    ON c.id     = p.cate_id
                ORDER BY p_id DESC
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        }catch(\Exception $e){
            debug($e);
        }
    }
}

if(!function_exists('showOneForProduct')){
    function showOneForProduct($id){
        try{
            $sql = "
                SELECT 
                        p.id                as p_id,
                        p.title             as p_title,
                        p.cate_id           as p_cate_id,
                        p.price             as p_price,
                        p.discount          as p_discount,
                        p.description       as p_description,
                        p.created_at        as p_created_at,
                        p.updated_at        as p_updated_at,
                        p.view_count        as p_view_count,
                        p.quantity          as p_quantity,
                        p.weight            as p_weight,
                        p.image             as p_image,
                        c.name              as c_name

                FROM products as p
                INNER JOIN categories   as c    ON c.id     = p.cate_id
                WHERE
                    p.id = :id
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


if (!function_exists('checkUniqueTitleProduct')) {
    function checkUniqueTitleProduct($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName where title = :name LIMIT 1";

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
if (!function_exists('checkUniqueTitleForUpdateProduct')) {
    function checkUniqueTitleForUpdateProduct($tableName,$id,$name)
    {
        try {

            $sql = "SELECT * FROM $tableName where title = :name AND id <> :id LIMIT 1";

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