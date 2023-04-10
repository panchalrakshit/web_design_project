<!DOCTYPE html>
<html>
<head>
  <title>Add a New Restaurant</title>
  <style>
    body {
      background-color: #4593a1;
      font-family: Arial, sans-serif;
    }
    
    h1 {
      color: white;
      text-align: center;
    }

    form {
      background-color: white;
      color: #4593a1;
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border-radius: 10px;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }

    input[type="text"] {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      width: 100%;
      margin-bottom: 20px;
    }

    input[type="submit"] {
      background-color: #4593a1;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #35838d;
    }
  </style>
</head>
<body>

  <h1>Add a New Restaurant</h1>

  <form  action="ADD_restaurant.php" method="post" enctype="multipart/form-data">
    <label for="restaurant_name">Restaurant Name:</label>
    <input type="text" id="restaurant_name" name="restaurant_name">

    <label for="restaurant_image">Image:</label>
    <input type="file" id="restaurant_image" name="restaurant_image">

    <label>Cuisines:</label>
    <div>
      <input type="checkbox" id="restaurant_northindian" name="cuisine[]" value="NORTHINDIAN">
      <label for="restaurant_northindian">NORTH INDIAN</label>
    </div>
    <div>
      <input type="checkbox" id="restaurant_southindian" name="cuisine[]" value="SOUTHINDIAN">
      <label for="restaurant_southindian">SOUTH INDIAN</label>
    </div>
    <div>
      <input type="checkbox" id="restaurant_chinese" name="cuisine[]" value="CHINESE">
      <label for="restaurant_chinese">CHINESE</label>
    </div>
    <div>
      <input type="checkbox" id="restaurant_italian" name="cuisine[]" value="ITALIAN">
      <label for="restaurant_italian">ITALIAN</label>
    </div>
    <div>
      <input type="checkbox" id="restaurant_drinks" name="cuisine[]" value="DRINKS">
      <label for="restaurant_drinks">DRINKS</label>
    </div>
    
    <label for="restaurant_address">Restaurant Address:</label>
    <input type="text" id="restaurant_address" name="restaurant_address">

    <label for="restaurant_phone">Restaurant Phone:</label>
    <input type="text" id="restaurant_phone" name="restaurant_phone">

   <input type="submit" value="submit" onclick="redirectToMenu()">
   </form>

  <script>
    function redirectToMenu() {
      alert("Restaurant added successfully!");
      window.location.href = "menu.html";
    }
  </script>

</body>
</html>