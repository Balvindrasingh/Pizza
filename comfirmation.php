<?php
include('db_connection.php'); // Include the database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $numPizzas = $_POST["num-pizzas"];
    $pizzaSize = $_POST["pizza-size"];
    $pizzaShape = $_POST["pizza-shape"];
    $toppings = implode(", ", $_POST["toppings"]); // Convert array to string
    $crust = $_POST["crust"];
    $orderType = $_POST["order-type"];
    $comments = $_POST["comments"];

    // SQL query to insert data into the 'orders' table
    $sql = "INSERT INTO orders (name, phone, email, num_pizzas, pizza_size, pizza_shape, toppings, crust, order_type, comments)
            VALUES ('$name', '$phone', '$email', '$numPizzas', '$pizzaSize', '$pizzaShape', '$toppings', '$crust', '$orderType', '$comments')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>