<div class="row">
    <div class="col-3">
        <div>
            <h3>Amount of reviews:<br/>
                <?php
                    $product_id = mysqli_real_escape_string($mysqli, $_GET["id"]);

                    $result = $mysqli->query("SELECT COUNT(*) as reviewcount FROM reviews WHERE product_id = {$product_id};");

                    if (mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                        echo $row["reviewcount"];
                    }
                ?>
            </h3>
        </div>
        <div style="padding-top: 5rem;">
            <h3>Average Score:<br/>
                <?php
                    $result = $mysqli->query("SELECT AVG(score) as average FROM reviews WHERE product_id = {$product_id};");

                    if (mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                        echo $row["average"];
                    }
                ?>
            </h3>
        </div>
        <a href="<?php echo get_relative_root();?>/pages/add_review.php?id=<?php echo $product_id; ?>" class="btn btn-primary mt-3">Review Plaatsen</a>
    </div>
    <div class="col-9">
        <?php
             $result = $mysqli->query("SELECT first_name, last_name, score, description, is_anonymous FROM users, reviews WHERE product_id = {$product_id} AND reviews.user_id = users.id;");

             if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)) {
                    $name = "";
                    if ($row["is_anonymous"]) {
                        $name = "Anonymous";
                    } else {
                        $name = $row["first_name"] . " " . $row["last_name"];
                    }

                    echo <<<EOT
                    <div class="review-item">
                        <div style="width: 20%;">
                            <p>Customer name: {$name}</p>
                            <p>Given Score: {$row["score"]}</p>
                        </div>
                        <div style="width: 10%;"></div>
                        <div style="width: 70%;">
                            <p>{$row["description"]}</p>
                        </div>
                    </div>
EOT;
                }
            }
        ?>
    </div>
</div>





