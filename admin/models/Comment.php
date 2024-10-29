<?php
if (!function_exists('listAllComment')) {
    function listAllComment()
    {
        try {
            $sql = "
                SELECT 
                    p.id            as p_id,
                    p.title         as p_title,
                    p.image         as p_image,
                    COUNT(c.id)     as comment_count
                FROM products as p
                LEFT JOIN comment as c ON p.id = c.product_id
                GROUP BY p.id, p.title, p.image
                HAVING COUNT(c.id) > 0
                ORDER BY comment_count DESC;
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
if (!function_exists('getCommentForProduct')) {
    function getCommentForProduct($id)
    {
        try {
            $sql = "
                SELECT 
                    c.id            as c_id,
                    c.content       as c_content,
                    c.user_id       as c_user_id,
                    c.date_comment  as c_date_comment,
                    u.full_name     as u_full_name
                    
                FROM comment as c
                LEFT JOIN users as u ON c.user_id = u.id
                WHERE c.product_id = :id
                ORDER BY c.date_comment DESC
            ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}


