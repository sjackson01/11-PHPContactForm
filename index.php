<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact Me</title>
    </head>
    <body>
        <h1>Contact Me</h1>
        <?php # Script 11.1 - email.php
        
        // Chek for form submission: 
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Minimal form validation
            if (!empty($_POST['name']) 
            && !empty($_POST['email']) 
            && !empty($_POST['comments'])){

            // Create body:
            $body = "Name: {$_POST['name']}\n\nComments: {$_POST['comments']}";

            // Limit the length to 70 characters : 
            $body = wordwrap($body, 70);

            // Send the email:
            mail('your_email@example.com', 'Contact From Submission', $body, "From:
            {$_POST['email']}");
            
            // Print a message
            echo '<p><em> Thank you for contacting me. I will reply some day</em></p>';

            // Clear $_POST (so that the form's not sticky): 
            $_POST = [];    

            } else {
                echo '<p> style="font-weight: bold; color: #C00">Please fill out the form completely. </p>';
            }
        } // End of main isset() IF
        
        //Create HTML form
        ?>
        <p>Please fill out this form to contact me.</p>
        <form action="email.php" method="post">
        <p>Name: <input type="text" name="name" size="30" maxlength="60" value="
            <?php if (isset($_POST['name'])) echo $_POST['name']; ?>"></p>
        <p>Email Address: <input type="email" name="email" size="30" maxlength="80" value="
            <?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>
        <p>Comments: <textarea name="comments" rows="5" cols="30">
            <?php if (isset($_POST['comments'])) echo $_POST['comments']; ?></textarea></p>
     <p><input type="submit" name="submit" value="Send!"></p>
    </form>
    </body>
</html>