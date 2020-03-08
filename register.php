<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <center>
        <form>
            Username : <input type="text" name="uname"><br>
            Email : <input type="email" name="email"><br>
            Password : <input type="password" name="pass"><br>
            <input type="submit" name="submit" value="Login"><br>
            If you have already account? <a href="index.php">Login</a>
        </form>
    </center>
        <?php
           if(isset($_REQUEST['submit']))
           {
               header("location:index.php");
           }
        ?>
    </body>
</html>