<?php

if(!function_exists('listAllForPost')){
    function listAllForPost(){
        try{
            $sql = "
                SELECT 
                        p.id                as p_id,
                        p.title             as p_title,
                        p.content           as p_content,
                        p.created_at        as p_created_at,
                        p.updated_at        as p_updated_at,
                        p.view_count        as p_view_count,
                        p.author_id         as p_author_id,
                        p.image             as p_image,
                        p.cate_id           as p_cate_id,
                        a.name              as a_name,
                        a.avatar            as a_avatar,
                        c.id                as c_id,
                        c.name              as c_name

                FROM posts as p
                INNER JOIN category_post   as c      ON c.id     = p.cate_id
                INNER JOIN authors   as a            ON a.id     = p.author_id
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

if(!function_exists('showOneForPost')){
    function showOneForPost($id){
        try{
            $sql = "
                 SELECT 
                        p.id                as p_id,
                        p.title             as p_title,
                        p.content           as p_content,
                        p.excerpt           as p_excerpt,
                        p.created_at        as p_created_at,
                        p.updated_at        as p_updated_at,
                        p.view_count        as p_view_count,
                        p.image             as p_image,
                        a.name              as a_name,
                        a.avatar            as a_avatar,
                        c.name              as c_name,
                        p.cate_id           as p_cate_id,
                        p.author_id         as p_author_id


                FROM posts as p
                INNER JOIN category_post   as c      ON c.id     = p.cate_id
                INNER JOIN authors   as a            ON a.id     = p.author_id
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


if (!function_exists('checkUniqueTitlePost')) {
    function checkUniqueTitlePost($tableName, $name)
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
if (!function_exists('checkUniqueTitleForUpdatePost')) {
    function checkUniqueTitleForUpdatePost($tableName,$id,$name)
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