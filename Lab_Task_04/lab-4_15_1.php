<html>
<head></head>
<body>
<?php
    $res = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST["day"];
        switch ($n) {
            case 1:
                $res = "Monday";
                break;
            case 2:
                $res = "Tuesday";
                break;
            case 3:
                $res = "Wednesday";
                break;
            case 4:
                $res = "Thursday";
                break;
            case 5:
                $res = "Friday";
                break;
            case 6:
                $res = "Saturday";
                break;
            case 7:
                $res = "Sunday";
                break;
            default:
                $res = "Invalid";
        }
    }
?>
    <form method="POST">
        <table border="1">
            <tr>
                <th>Number:</th>
                <td>
                    <select name="day">
                        <option value="">--Select a number--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Submit"></td>
            </tr>
            <tr>
                <th>Day:</th>
                <td><?php echo $res; ?></td>
            </tr>
        </table>
    </form>
</body>
</html>
