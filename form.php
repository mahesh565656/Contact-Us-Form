<?php
include "config.php";
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    // To avoid duplicate data entry

    $name = strip_tags($_POST['name']);       //strip_tags for avoiding html tags in input data
    $number = strip_tags($_POST['number']);   //strip_tags for avoiding html tags in input data
    $email = strip_tags($_POST['email']);     //strip_tags for avoiding html tags in input data
    $subject = strip_tags($_POST['subject']); //strip_tags for avoiding html tags in input data
    $message = strip_tags($_POST['message']); //strip_tags for avoiding html tags in input data
    
    $query = mysqli_query($conn, "INSERT INTO users(name,number,email,subject,message) VALUES('$name','$number','$email','$subject','$message')");
    
    if($query){
       
        // Mail Function can only run in localhost Environment.

        // $to="maheshghongade644@gmail.com";
        // $subject="Form Data Submitted";
        // $message="New User has filled contact us form.";
        // mail($to,$subject,$message);

       
        echo "<script>alert('Data Saved Successfully'); </script>";
    }
    else{
        echo "<script>alert('Error');</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    
    $sql = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC LIMIT 1");  //The input that is already filled should remain when you display an error for any other field.
    if (mysqli_num_rows($sql) > 0) {
        while ($row = mysqli_fetch_array($sql)) {
    ?>
            <form class="form" method="post" action="form.php">
                <legend style="font-size: larger; text-align:center;"> Contact Us</legend>
                <label>Full Name :</label>
                <input type="text" name="name" value="<?php if (isset($row['name'])) {
                                                            echo $row['name'];                           //The input that is already filled should remain when you display an error for any other field.
                                                        } ?>" required>
                <br>
                <label>Phone Number :</label>
                <input type="number" name="number" maxlength="10" value="<?php if (isset($row['number'])) {
                                                                                echo $row['number'];    //The input that is already filled should remain when you display an error for any other field.
                                                                            } ?>" required>
                <br>
                <label>Email :</label>
                <input type="email" name="email" required value="<?php if (isset($row['email'])) {
                                                                        echo $row['email'];             //The input that is already filled should remain when you display an error for any other field.
                                                                    } ?>">
                <br>
                <label>Subject :</label>
                <input type="text" name="subject" required value="<?php if (isset($row['subject'])) {
                                                                        echo $row['subject'];          //The input that is already filled should remain when you display an error for any other field.
                                                                    } ?>">
                <br>
                <label>Message :</label>
                <textarea type="text" name="message" required value="<?php if (isset($row['message'])) {
                                                                            echo $row['message'];      // The input that is already filled should remain when you display an error for any other field.
                                                                        } ?>"></textarea>
                <br>
       
        <input type="submit" name="submit" value="Submit">
            </form>
            <?php  }
    }
        ?>
</body>

</html>