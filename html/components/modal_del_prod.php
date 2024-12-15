
<!-- ADD DELIVERY -->
<div class='modal fade' id='modalAddExist' tabindex='-1'>
    <form action='../sql/inventory.php' method='post' enctype='multipart/form-data'>
        <div class='modal-dialog modal-md'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='modalMsgLabel'>ADD PRODUCT DELIVERY</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <input type='date' name='date' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' value="<?PHP echo date("Y-m-d"); ?>" required>
                    <select name="prodname" class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-select'>
                        <?PHP
                        $prodlist = $conn->query("SELECT * FROM tblproduct");
                        if ($prodlist->num_rows == 0) {
                            echo "<option value='null'>Currently No Product Listed</option>";
                        } else {
                            while ($row = $prodlist->fetch_assoc()) {
                                echo "<option value='$row[prodname]'>$row[prodname]</option>";
                            }
                        }
                        ?>
                    </select>
                    <input type='number' name='prodquan' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' placeholder='Product Quantity' required>
                    <input type='text' name='proddesc' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' placeholder='Product Description' required>
                </div>
                <div class='modal-footer justify-content-ends'>
                    <button type='submit' name='addDelivery' class='btn border-1 border-danger text-danger rounded-pill'><b>ADD PRODUCT</b></button>
                </div>
            </div>
        </div>
    </form>
</div>