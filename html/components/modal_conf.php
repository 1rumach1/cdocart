
<!-- CONFIRM ORDER -->
<?PHP 
$orderListMethod = $conn->query("SELECT * FROM tblorders WHERE method != 'COD'");
while ($orderrow = $orderListMethod->fetch_assoc()) {
    $method = ($orderrow["method"] == "COD") ? "Cash on Delivery" : "G-Cash"; 
?>
<div class="modal fade" tabindex="-1" id="gcash_<?PHP echo $orderrow['orderid'] ?>">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">
                <h5>Confirm Online Payment</h5>
                <small>Order <?PHP echo $orderrow['orderid'] ?> (<?PHP echo $method ?>)</small>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body justify-item-center">
            <div class="bg-light rounded shadow p-2" style="margin: auto;width: clamp(100px, 75vw, 400px); height: auto;">
                <?php
                echo "<img src='../pics/payment/$orderrow[method]' class='rounded' style='width: 100%; height: auto;'>";
                ?>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a type="button" class="btn btn-primary" href='../sql/cart.php?confirm_order=<?PHP echo $orderrow['orderid'] ?>'>Confirm</a>
        </div>
        </div>
    </div>
</div>
<?PHP
}
?>