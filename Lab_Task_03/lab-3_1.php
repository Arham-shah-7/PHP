<html>
<head>
    <title>Add</title>
</head>
<body>
<?php
    $res="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n1 = $_POST["n1"];
        $n2 = $_POST["n2"];
        $res = $n1 + $n2; 
    }
?>
    <form method="POST">
        <table border="1" cellpadding="5">
            <tr>
                <td>No.1 :</td>
                <td><input type="number" name="n1" value="<?php echo $n1; ?>"></td>
            </tr>
            <tr>
                <td>No.2 :</td>
                <td><input type="number" name="n2" value="<?php echo $n2; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Add"></td>
            </tr>
            <tr>
                <td>Result :</td>
                <td><?php echo $res; ?></td>
            </tr>
        </table>
    </form>
</body>
</html>