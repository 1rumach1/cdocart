<?php
if(isset($_POST["search"])){
    if(isset($_POST["date"])){
        $date = $_POST["date"];
        if(strlen($date) == 7) {  // Monthly format (Y-m)
            $start_date = $date . "-01";
            $end_date = date("Y-m-t", strtotime($start_date));
            $query = "SELECT * FROM tblorders WHERE date BETWEEN '$start_date' AND '$end_date'";
        } else {  // Daily format (Y-m-d)
            $query = "SELECT * FROM tblorders WHERE date='$date'";
        }    
    }else{
        $from = $_POST['from'];
        $to = $_POST['to'];
        $query = "SELECT * FROM tblorders WHERE date BETWEEN '$from' AND '$to'";
    }
} else {
    $date = date("Y-m-d");
    $query = "SELECT * FROM tblorders WHERE date='$date'";
}

$prod = $conn->query($query);
if($prod->num_rows == 0){
    echo "<tr><td colspan=4 class='text-secondary'><h6>Currently no Report.</h6></td></tr>";
} else {
    $prodList = array();
    while ($col = $prod->fetch_assoc()) {
        $result = $conn->query("SELECT * FROM tblcart WHERE orderid = '$col[orderid]'");
        while ($row = $result->fetch_assoc()) {
            $prodname = $row['prodname'];
            if (array_key_exists($prodname, $prodList)) {
                $prodList[$prodname][1] += $row['quan'];
            } else {
                $prodList[$prodname] = array($row['price'], $row['quan']);
            }
        }
    }
    foreach($prodList as $key => $value){
        $totalPrice = $value[0] * $value[1];
        echo "<tr>
            <td>$key</td>
            <td>P $value[0]</td>
            <td>$value[1]</td>
            <td>P $totalPrice</td>
        </tr>";    
    }
}
?>