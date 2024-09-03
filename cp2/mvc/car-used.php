<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Used Cars DataTable
    </div>

    <?php
    $cond = "";
    $user_search = "";

    // Prevent SQL injection by using prepared statements
    if (isset($_POST['submit'])) {
        $user_search = trim($_POST['user_search']);
        $cond = "WHERE car_id=? OR car_name LIKE ?";
    } else {
        $cond = "ORDER BY car_id DESC LIMIT 20";
    }
    ?>

    <form method="POST" action="">
        <input type="text" name="user_search" placeholder="userid or name or photoname" value="<?php
        // Use htmlspecialchars to prevent XSS attacks
        echo htmlspecialchars($user_search);
        ?>">
        <input type="submit" name="submit" value="Submit">
    </form>

    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Use prepared statements to prevent SQL injection
                $stmt = mysqli_prepare($con, "SELECT * FROM car_used $cond");
                if ($stmt) {
                    if (isset($_POST['submit'])) {
                        $searchParam = "%$user_search%";
                        mysqli_stmt_bind_param($stmt, "ss", $user_search, $searchParam);
                    }
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while ($ru = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo htmlspecialchars($ru["user_id"]); ?></td>
                            <td><?php echo htmlspecialchars($ru["car_name"]); ?></td>
                            <td><?php echo htmlspecialchars(get_info("car_used_photo", "photo_name", "WHERE car_id=" . $ru["car_id"])); ?></td>
                        </tr>
                <?php
                    }
                    mysqli_stmt_close($stmt);
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
