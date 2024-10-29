<?php

if(!function_exists('listAllForGallery')){
    function listAllForGallery(){
        try{
            $sql = "
                SELECT 
                        g.id                as g_id,
                        g.product_id        as g_product_id,
                        g.thumbnail         as g_thumbnail,
                        p.title             as p_title

                FROM gallery as g
                INNER JOIN products as p ON p.id = g.product_id
                ORDER BY g_id DESC
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        }catch(\Exception $e){
            debug($e);
        }
    }
}

if(!function_exists('showOneForGallery')){
    function showOneForGallery($id){
        try{
            $sql = "
                SELECT 
                        g.id                as g_id,
                        g.product_id        as g_product_id,
                        g.thumbnail         as g_thumbnail,
                        p.title             as p_title
                        
                FROM gallery as g
                INNER JOIN products   as p    ON p.id     = g.product_id
                WHERE
                    g.id = :id
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