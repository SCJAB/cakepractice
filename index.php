<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link rel="stylesheet" href="./dist/output.css">
    <title>Cake Home</title>
</head>
<body class="h-screen bg-orange-300 font-cursive text-2xl">
    <div class="mb-4">
        <img class="w-full h-52" src="./img/cakedrip.png">

        <h1 class="flex justify-center text-6xl">D-I-Y Cake</h1>
    </div>

    <div class="w-2/3 mx-auto">
        <form class="p-4 border-2 border-rose-600 rounded-2xl" method="post">
            <div class="flex mb-4">
                <div class="w-2/5 pr-4">
                    <label class="flex justify-center font-bold mb-2 p-3 border-2 border-rose-600 rounded-2xl">Cake Shape</label>
                    <div class="border-2 border-rose-600 p-2 rounded-2xl">
                        <input type="radio" name="cake_shape" value="heart" id="heart"> <label for="heart">Heart</label><br>
                        <input type="radio" name="cake_shape" value="rectangle" id="rectangle"> <label for="rectangle">Rectangle</label><br>
                        <input type="radio" name="cake_shape" value="square" id="square"> <label for="square">Square</label><br>
                        <input type="radio" name="cake_shape" value="round" id="round"> <label for="round">Round</label><br><br>
                    </div>
                </div>
                <div class="w-2/5 pr-4">
                    <label class="flex justify-center font-bold mb-2 p-3 border-2 border-rose-600 rounded-2xl">Cake Flavor</label>
                    <div class="border-2 border-rose-600 p-2 rounded-2xl">
                        <input type="radio" name="cake_flavor" value="chocolate" id="chocolate"> <label for="chocolate">Chocolate</label><br>
                        <input type="radio" name="cake_flavor" value="vanilla" id="vanilla"> <label for="vanilla">Vanilla</label><br>
                        <input type="radio" name="cake_flavor" value="square" id="square"> <label for="square">Square</label><br>
                        <input type="radio" name="cake_flavor" value="round" id="round"> <label for="round">Round</label><br><br>
                    </div>
                </div>
                <div class="w-2/5">
                    <label class="flex justify-center font-bold mb-2 p-3 border-2 border-rose-600 rounded-2xl">Cake Toppings</label>
                    <div class="border-2 border-rose-600 p-2 rounded-2xl">
                        <input type="radio" name="cake_toppings" value="cookies" id="cookies"> <label for="cookies">Cookies</label><br>
                        <input type="radio" name="cake_toppings" value="ssf" id="ssf"> <label for="ssf">Spun-sugar Flowers</label><br>
                        <input type="radio" name="cake_toppings" value="mcc" id="mcc"> <label for="mcc">Mini Chocolate Candies</label><br>
                        <input type="radio" name="cake_toppings" value="marshmollows" id="marshmollows"> <label for="marshmollows">Marshmollows</label><br><br>
                    </div>
                </div>
            </div>

            <div>
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" id="quantity" value="1" class="w-20 p-2 rounded-lg shadow-2xl bg-rose-400 text-white"><br><br>

                <button type="submit" name="submit" class="bg-orange-300 hover:bg-rose-400 text-white font-bold py-2 px-4 rounded-lg shadow-2xl">Build My Cake</button>
            </div>  
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $cake_shape = isset($_POST['cake_shape']) ? $_POST['cake_shape'] : '';
        $cake_flavor = isset($_POST['cake_flavor']) ? $_POST['cake_flavor'] : '';
        $cake_toppings = isset($_POST['cake_toppings']) ? (array)$_POST['cake_toppings'] : [];
        $quantity = (int)$_POST['quantity'];

        $total_price = 0;

        // Define prices for different options in an array
        $prices = [
            'heart' => 10,
            'rectangle' => 12,
            'square' => 14,
            'round' => 16,
            'chocolate' => 10,
            'vanilla' => 12,
            'square-flavor' => 14,
            'round-flavor' => 16,
            'cookies' => 2,
            'ssf' => 3,
            'mcc' => 4,
            'marshmollows' => 5,
        ];

        // Check if required options are selected
        if (!empty($cake_shape) && !empty($cake_flavor)) {
            // Calculate the total price
            $total_price += $prices[$cake_shape];
            $total_price += $prices[$cake_flavor];
            foreach ($cake_toppings as $topping) {
                $total_price += $prices[$topping];
            }
            $total_price *= $quantity;

            // Display the user's cake order
            echo '<div class="w-2/3 mx-auto mt-4 p-4 bg-orange-100 shadow-2xl rounded-2xl text-center">';
            echo '<h2 class="text-2xl font-bold mb-4 text-red-600">Your Cake Order:</h2>';
            echo "<p class='text-lg'>Cake Shape: $cake_shape</p>";
            echo "<p class='text-lg'>Cake Flavor: $cake_flavor</p>";
            echo "<p class='text-lg'>Cake Toppings: " . implode(", ", (array)$cake_toppings) . "</p>";
            echo "<p class='text-lg'>Quantity: $quantity</p>";
            echo '<h3 class="text-2xl font-bold mt-4 text-red-600">Total Price: $' . number_format($total_price, 2) . '</h3>';
            echo '</div>';
        } else {
            echo '<div class="w-2/3 mx-auto mt-4 p-4 bg-orange-100 shadow-2xl rounded-2xl text-center ">';
            echo '<p class="text-2xl font-bold">Please select Cake Shape and Cake Flavor to calculate the total price.</p>';
            echo '</div>';
        }
    }
    ?>
</body>
</html>