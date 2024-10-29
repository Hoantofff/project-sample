<?php

// Model Product
function listAllForProduct($page, $itemsPerPage)
{
    try {
        // Tính toán offset dựa trên trang hiện tại và số lượng sản phẩm trên mỗi trang
        $offset = ($page - 1) * $itemsPerPage;

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
            ORDER BY p.id DESC
        ";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(':limit', $itemsPerPage);
        $stmt->bindParam(':offset', $offset);

        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}



if (!function_exists('showOneForProduct')) {
    function showOneForProduct($id)
    {
        try {
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
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
function productTop8Random()
{
    try {
        $sql = "SELECT * FROM products ORDER BY RAND() DESC LIMIT 8";

        $stmt = $GLOBALS['conn']->prepare($sql);


        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}

function productTop6Latest()
{
    try {
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 6";

        $stmt = $GLOBALS['conn']->prepare($sql);


        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}

function productTop6Trending()
{
    try {
        $sql = "SELECT * FROM products ORDER BY view_count DESC LIMIT 6";

        $stmt = $GLOBALS['conn']->prepare($sql);


        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}

// Product Detail
function getProductById($id)
{
    try {
        $sql = "
            SELECT 
                    p.id            as p_id,
                    p.title         as p_title,
                    p.price         as p_price,
                    p.discount      as P_discount,
                    P.cate_id       as p_cate_id,
                    p.image         as p_image,
                    p.description   as p_description,
                    p.view_count    as p_view_count,
                    p.quantity      as p_quantity,
                    p.weight        as p_weight,
                    c.name          as c_name

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
    } catch (\Exception $e) {
        debug($e);
    }
}

function ProductRelated($id)
{
    try {
        $sql = "
            SELECT 
                    p.id            as p_id,
                    p.title         as p_title,
                    p.price         as p_price,
                    p.discount      as P_discount,
                    P.cate_id       as p_cate_id,
                    p.image         as p_image,
                    p.description   as p_description,
                    p.view_count    as p_view_count,
                    c.name          as c_name

            FROM products as p
            INNER JOIN categories   as c    ON c.id     = p.cate_id
            WHERE
                p.id <> :id
            AND
                p.cate_id = c.id
            LIMIT 4
        ";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}


// End Model Product

// Model Post

function postTop3Random()
{
    try {
        $sql = "SELECT * FROM posts ORDER BY RAND() DESC LIMIT 3";

        $stmt = $GLOBALS['conn']->prepare($sql);


        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}


function listAllForPost()
{
    try {
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
                INNER JOIN category_post   as c      ON c.id     = p.cate_id
                INNER JOIN authors   as a            ON a.id     = p.author_id
                ORDER BY p_id DESC
            ";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}

function getPostById($id)
{
    try {
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
    } catch (\Exception $e) {
        debug($e);
    }
}

function postTop3Trending()
{
    try {
        $sql = "SELECT * FROM posts ORDER BY view_count DESC LIMIT 3";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}

function PostRelated($id)
{
    try {
        $sql = "
            SELECT 
                    p.id            as p_id,
                    p.title         as p_title,
                    p.excerpt       as p_excerpt,
                    p.author_id     as P_author_id,
                    P.cate_id       as p_cate_id,
                    p.image         as p_image,
                    p.created_at    as p_created_at,
                    p.updated_at    as p_updated_at,
                    p.view_count    as p_view_count,
                    a.name          as a_name,
                    a.avatar        as a_avatar,
                    c.id            as c_id,
                    c.name          as c_name

            FROM posts as p
            INNER JOIN category_post    as c       ON c.id     = p.cate_id
            INNER JOIN authors          as a       ON a.id     = p.author_id
            WHERE
                p.id <> :id
            LIMIT 3
        ";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetchAll();
    } catch (\Exception $e) {
        debug($e);
    }
}
// End Model Post