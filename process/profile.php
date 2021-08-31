<?php
$userinfo = null;
if (isset($_SESSION["uid"])) {
    $uid = $_SESSION["uid"];
    // get user info
    $sql = "SELECT * FROM user_info where user_id = " . $uid;
    $query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($query);
    if ($count > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $userinfo = array($row['first_name'], $row['last_name'], $row['email'], $row['mobile'], $row['password']);
        }

    }
} else {
    $warning = "<div id='alert' role=\"alert\" class=\"alert alert-warning d-sm-flex justify-content-sm-center align-items-sm-center\">
                <span><strong> لطفا وارد حساب کاربری خود شوید  </strong></span>
                <span onclick=\"document.getElementById('alert').remove()\" class=\"closealert\" >&times;</span>
                </div>";
    $_SESSION['message'] = $warning;
}