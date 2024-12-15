<?PHP
$Null = "
    <div class='mx-3 m-2 d-flex' style='min-width: 1000px;'>
        <div class='mx-auto'>
            <h4 class='fw-bold mb-3'>Empty List</h4>
        </div>
    </div>
<hr style='min-width: 1000px;'>";
?>

<iframe id="pdfPreview" style="width: 100%; height: 500px; border: none; display: none;"></iframe>
<div class="tab-content px-md-4 px-2" id="nav-tabContent">
    <div class="tab-pane fade show active p-3" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
        <h4 style='letter-spacing: 5px; font-size: clamp(15px,2vw,20px);'>ORDER LIST</h4>
        <hr>
        <div class='table-responsive'>
            <?PHP
            $userOrderList = $conn->query("SELECT * FROM  tblorders WHERE cusname='$_SESSION[name]' and status != 'Completed'");
            $adminOrderList = $conn->query("SELECT * FROM  tblorders WHERE status = 'Processing'");

            $orderList = ($_SESSION["position"] == "admin")?$adminOrderList:$userOrderList;
            if($orderList && $orderList->num_rows > 0){
                while($row=$orderList->fetch_assoc()){
                    $GetUid = $conn->query("SELECT * FROM  tblcart WHERE orderid='$row[orderid]'");
                    $itemNo = $GetUid->num_rows;
                    
                    if($row['method'] == "COD"){
                        $method = "<div class='d-none d-xl-inline align-self-center fw-bold mx-4'><a href='../sql/cart.php?confirm_order=$row[orderid]' onclick='condfirmBut()' type='button' class='btn bg-0 border fw-bold border-success text-success bg-opacity-50 rounded-pill'><small>Confirm</small></a></div>";
                    }else{
                        $method = "<div class='d-none d-xl-inline align-self-center fw-bold mx-4'><button type='button' class='btn bg-0 border fw-bold border-success text-success bg-opacity-50 rounded-pill' data-bs-toggle='modal' data-bs-target='#gcash_$row[orderid]'><small>Confirm</small></button></div>";
                    }
    
                    echo "
                        <div class='mx-3 m-2 d-flex' style='min-width: 1000px;'>
                            <div class='me-auto'>
                                <p class='fw-bold mb-3'>Order No: $row[orderid]</p>
                                <small class=''>$row[cusname]</small><br>
                                <small class=''>$itemNo Total Item</small>
                            </div>
                            <div class='align-self-center mx-4'>
                                <b>Date:</b> $row[date]<br>
                                <b>Address:</b> $row[address]
                            </div>
                            <div class='align-self-center mx-4'><b>Status</b>: $row[status]</div>
                            <div class='align-self-center fw-bold mx-4'>P $row[total]</div>
                            <div class='align-self-center fw-bold mx-4'><button type='button' class='btn bg-secondary bg-opacity-50 rounded-pill' data-bs-toggle='modal' data-bs-target='#$row[orderid]'><small>View Order</small></button></div>
                            $method
                        </div>
                    <hr style='min-width: 1000px;'>";
                }
            }else{
                echo $Null;
            }
            ?>
        </div>
    </div>
    <div class="tab-pane fade p-3" id="nav-toShip" role="tabpanel" aria-labelledby="nav-toShip-tab">
        <div class="table-responsive">
            <h4 style='letter-spacing: 5px; font-size: clamp(15px,2vw,20px);'>TO SHIP LIST</h4>
            <hr>
            <div class='table-responsive'>
                <?PHP
                $orderShipList = $conn->query("SELECT * FROM  tblorders WHERE status = 'Shipping'");
                if($orderShipList->num_rows > 0){
                    while($row=$orderShipList->fetch_assoc()){
                        $GetUid = $conn->query("SELECT * FROM  tblcart WHERE orderid='$row[orderid]'");
                        $itemNo = $GetUid->num_rows;
                        echo "
                            <div class='mx-3 m-2 d-flex' style='min-width: 1000px;'>
                                <div class='me-auto'>
                                    <p class='fw-bold mb-3'>Order No: $row[orderid]</p>
                                    <small class=''>$row[cusname]</small><br>
                                    <small class=''>$itemNo Total Item</small>
                                </div>
                                <div class='align-self-center mx-4'>
                                    <b>Date:</b> $row[date]<br>
                                    <b>Address:</b> $row[address]
                                </div>
                                <div class='align-self-center mx-4'><b>Status</b>: $row[status]</div>
                                <div class='align-self-center fw-bold mx-4'>P $row[total]</div>
                                <div class='align-self-center fw-bold mx-4'><button type='button' class='btn bg-secondary bg-opacity-50 rounded-pill' data-bs-toggle='modal' data-bs-target='#$row[orderid]'><small>View Order</small></button></div>
                                <div class='align-self-center fw-bold mx-4'><a href='../sql/cart.php?comp_order=$row[orderid]' type='button' class='btn bg-0 border fw-bold border-success text-success bg-opacity-50 rounded-pill'><small>Delivered</small></a></div>
                            </div>
                        <hr style='min-width: 1000px;'>            
                        ";
                    }    
                }else{
                    echo $Null;
                }
                ?>
            </div>
        </div>
    </div>
    <div class="tab-pane fade p-3" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab">
        <div class="table-responsive">
            <h4 style='letter-spacing: 5px; font-size: clamp(15px,2vw,20px);'>COMPLETED LIST</h4>
            <hr>
            <div class='table-responsive'>
                <?PHP
                $u_orderCompList = $conn->query("SELECT * FROM  tblorders WHERE cusname='$_SESSION[name]' and status = 'Completed'");
                $a_orderCompList = $conn->query("SELECT * FROM  tblorders WHERE status = 'Completed'");

                $orderCompList = ($_SESSION["position"] == "admin")?$a_orderCompList:$u_orderCompList;

                if($orderCompList->num_rows > 0 ){
                    while($row=$orderCompList->fetch_assoc()){
                        $GetUid = $conn->query("SELECT * FROM  tblcart WHERE orderid='$row[orderid]'");
                        $itemNo = $GetUid->num_rows;
                        echo "
                            <div class='mx-3 m-2 d-flex' style='min-width: 1000px;'>
                                <div class='me-auto'>
                                    <p class='fw-bold mb-3'>Order No: $row[orderid]</p>
                                    <small class=''>$row[cusname]</small><br>
                                    <small class=''>$itemNo Total Item</small>
                                </div>
                                <div class='align-self-center mx-4'>
                                    <b>Date:</b> $row[date]<br>
                                    <b>Address:</b> $row[address]
                                </div>
                                <div class='align-self-center mx-4'><b>Status</b>: $row[status]</div>
                                <div class='align-self-center fw-bold mx-4'>P $row[total]</div>
                                <div class='align-self-center fw-bold mx-4'><button type='button' class='btn bg-secondary bg-opacity-50 rounded-pill' data-bs-toggle='modal' data-bs-target='#$row[orderid]'><small>View Order</small></button></div>
                            </div>
                        <hr style='min-width: 1000px;'>            
                        ";
                    }    
                }else{
                    echo $Null;
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    <?PHP
    if(isset($_GET["ordid"])){
        echo "
            const iframe = document.getElementById('pdfPreview');
            iframe.src = '../fpdf/print_reciept.php?reciept_id=$_GET[ordid]';
            iframe.onload = function() {
                try {
                    // Modern browsers: Attempt to trigger print preview
                    iframe.contentWindow.print();
                } catch (err) {
                    console.error('Could not open print preview:', err);
                }
            };
        ";
    }
    ?>
    </script>