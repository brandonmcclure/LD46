<html>
<body>

Welcome <?php 

print_r($_POST);
if (isset($_POST["name"])) {
    $name = $_POST["name"];
}
else{
    $name = "NULL_name";
}
echo $name; 

?><br>
Your email address is: <?php 

print_r($_POST);
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
else{
    $email = "NULL_email";
}
echo $email; ?>

</body>
</html> 