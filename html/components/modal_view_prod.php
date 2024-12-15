
<!-- VIEW ORDERS -->
<?php 

$userOrderList = $conn->query("SELECT * FROM  tblorders WHERE cusname='$_SESSION[name]' and status != 'Completed'");
$adminOrderList = $conn->query("SELECT * FROM  tblorders WHERE status = 'Processing'");
$orderList = ($_SESSION["position"] == "admin")?$adminOrderList:$userOrderList;
while ($orderrow = $orderList->fetch_assoc()) {
    $uniqid = $conn->query("SELECT * FROM tblcart WHERE orderid = '$orderrow[orderid]'");
    $itemNo = $uniqid->num_rows;
    $method = ($orderrow["method"] == "COD") ? "Cash on Delivery" : "G-Cash";
    ?>
    <div class="modal fade" id="<?php echo $orderrow['orderid']; ?>" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMsgLabel" style="font-size: clamp(13px, 2vw, 20px);">
                        Order <?php echo $orderrow['orderid']; ?> 
                        (<?php echo $method; ?>)
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php while ($cartrow = $uniqid->fetch_assoc()): ?>
                        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between p-2 px-3">
                            <div class="p-2 bg-secondary bg-opacity-25 shadow-sm rounded" 
                                 style="width: 100px; height: 100px; 
                                        background-image: url(../pics/<?php echo $cartrow['prodimage']; ?>); 
                                        background-size: cover;">
                            </div>
                            <div class="fw-bold text-center text-lg-start mt-3 mt-lg-0">
                                <?php echo $cartrow['prodname']; ?>
                            </div>
                            <div class="fw-bold mt-3 mt-lg-0">
                                P <?php echo $cartrow['price']; ?>
                            </div>
                            <div class="d-flex align-items-center mt-3 mt-lg-0 fw-bold">
                                Quantity: <?php echo $cartrow['quan']; ?>
                            </div>
                        </div>
                        <hr>
                    <?php endwhile; ?>
                </div>
                <div class="modal-footer p-3 ">
                    <b class="me-5">TOTAL AMOUNT</b>
                    <b>P <?PHP echo $orderrow['total'];?></b>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>