<?php
// Retrieve categories from database
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);

        // Check if any categories are found in the database
        if (mysqli_num_rows($result) > 0) {
          // Loop through each category and display it in the navbar
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $name = $row["name"];

            // Display the category in the navbar
            echo '<a href="plants.php?category='.$id.'">'.$name.'</a>';
          }
        }

        // Close the database connection
        mysqli_close($conn);
        ?>