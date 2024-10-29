<?php

function ProductForCategory($categoryId){
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
                WHERE p.cate_id = :categoryId
            ";
    
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':categoryId', $categoryId);
            $stmt->execute();
    
            return $stmt->fetchAll();
    }catch (\Exception $e) {
        debug($e);
    }
}
function PostForCategory($categoryId){
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
                        p.author_id         as p_author_id,
                        p.image             as p_image,
                        p.cate_id           as p_cate_id,
                        a.name              as a_name,
                        a.avatar            as a_avatar,
                        c.id                as c_id,
                        c.name              as c_name
    
                FROM posts as p
                INNER JOIN category_post   as c    ON c.id     = p.cate_id
                INNER JOIN authors         as a    ON a.id     = p.author_id
                WHERE p.cate_id = :categoryId
            ";
    
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':categoryId', $categoryId);
            $stmt->execute();
    
            return $stmt->fetchAll();
    }catch (\Exception $e) {
        debug($e);
    }
}