
<!-- UPDATE PRODUCT -->
<?php 
$prodlist = $conn->query("SELECT * FROM tblproduct");
while ($row = $prodlist->fetch_assoc()) {
    echo "
            <div class='modal fade' id='$row[prodid]' tabindex='-1'>
                <form action='../sql/inventory.php' method='post' enctype='multipart/form-data'>
                    <div class='modal-dialog modal-md'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='modalMsgLabel'>UPDATE PRODUCT</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <input type='hidden' name='prodid' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' value='$row[prodid]' required>
                                <input type='text' name='prodname' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' value='$row[prodname]' required>
                                <input type='text' name='prodprice' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' value='$row[prodprice]' required>
                                <input type='text' name='proddesc' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' value='$row[proddesc]' required>
                                <input type='text' name='prodquan' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' value='$row[prodquantity]' required>
                                <label class='ps-2 m-2'>Product Image</label>
                                <input type='file' name='prodimage' class='form-control' accept='.png, .jpg, .jpeg'>
                            </div>
                            <div class='modal-footer justify-content-ends'>
                                <button type='submit' name='updProduct' class='btn border-1 border-danger text-danger rounded-pill'><b>UPDATE PRODUCT</b></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            ";
}
?>