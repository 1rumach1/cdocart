<div class='tab-content px-md-4 px-2' id='nav-tabContent'>
    <div class='tab-pane fade show active p-3' id='nav-pending' role='tabpanel' aria-labelledby='nav-pending-tab'>
        <h4 style='letter-spacing: 5px; font-size: clamp(15px,2vw,20px);'>PENDING ORDERS</h4>
        <hr>
        <div class='table-responsive'>
        <?PHP
        $userOrderList = $conn->query("SELECT * FROM  tblorders WHERE cusname='$_SESSION[name]' and status != 'Completed'");
        $adminOrderList = $conn->query("SELECT * FROM  tblorders WHERE status = 'Processing'");
        $orderList = ($_SESSION["position"] == "admin")?$adminOrderList:$userOrderList;
        while($row=$orderList->fetch_assoc()){
            $uniqid = $conn->query("SELECT * FROM  tblcart WHERE orderid='$row[orderid]'");
            $itemNo = $uniqid->num_rows;
            echo "
                <div class='mx-3 m-2 d-flex' style='min-width: 600px;'>
                    <div class='me-auto'>
                        <p class='fw-bold mb-3'>Order No: $row[orderid]</p>
                        <small class=''>$itemNo Total Item</small>
                    </div>
                    <div class='align-self-center mx-4'><b>Status</b>: $row[status]</div>
                    <div class='align-self-center fw-bold mx-4'>P $row[total]</div>
                    <div class='align-self-center fw-bold mx-4'><button type='button' class='btn bg-secondary bg-opacity-50 rounded-pill' data-bs-toggle='modal' data-bs-target='#$row[orderid]'><small>View Order</small></button></div>
                </div>
            <hr style='min-width: 600px;'>            
            ";
        }
        ?>
        </div>
    </div>
    <div class='tab-pane fade  p-3' id='nav-completed' role='tabpanel' aria-labelledby='nav-completed-tab'>
        <h4 style='letter-spacing: 5px; font-size: clamp(15px,2vw,20px);'>COMPLETED ORDERS</h4>
        <hr>
        <div class='table-responsive'>
        <?PHP
        $u_orderCompList = $conn->query("SELECT * FROM  tblorders WHERE cusname='$_SESSION[name]' and status = 'Completed'");
        $a_orderCompList = $conn->query("SELECT * FROM  tblorders WHERE status = 'Completed'");
        $orderCompList = ($_SESSION["position"] == "admin")?$a_orderCompList:$u_orderCompList;
        while($row=$orderCompList->fetch_assoc()){
            $uniqid = $conn->query("SELECT * FROM  tblcart WHERE orderid='$row[orderid]'");
            $itemNo = $uniqid->num_rows;
            echo "
                <div class='mx-3 m-2 d-flex' style='min-width: 600px;'>
                    <div class='me-auto'>
                        <p class='fw-bold mb-3'>Order No: $row[orderid]</p>
                        <small class=''>$itemNo Total Item</small>
                    </div>
                    <div class='align-self-center mx-4'><b>Status</b>: $row[status]</div>
                    <div class='align-self-center fw-bold mx-4'>P $row[total]</div>
                    <div class='align-self-center fw-bold mx-4'><button type='button' class='btn bg-secondary bg-opacity-50 rounded-pill' data-bs-toggle='modal' data-bs-target='#$row[orderid]'><small>View Order</small></button></div>
                </div>
            <hr style='min-width: 600px;'>            
            ";
        }
        ?>
        </div>
    </div>
</div>
