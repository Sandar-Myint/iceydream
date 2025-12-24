if ($select_seller->rowCount() > 0){
        setcookie('seller_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('Location: dashboard.php');
        exit();