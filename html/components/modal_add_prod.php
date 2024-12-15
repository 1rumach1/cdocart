
<!-- ADD PRODUCT -->
<div class='modal fade' id='modalAddNew' tabindex='-1' aria-labelledby='modalAddLabel' aria-hidden='true'>
    <form action='../sql/inventory.php' method='post' enctype='multipart/form-data'>
        <div class='modal-dialog modal-md'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='modalMsgLabel'>ADD NEW PRODUCT</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <input type='text' name='prodname' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' placeholder='Product Name' required>
                    <input type='text' name='prodprice' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' placeholder='Product Price' required>
                    <input type='text' name='proddesc' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' placeholder='Product Description' required>
                    <input type='text' name='prodquan' class='bg-0 pb-2 mb-4 rounded-0 border-0 border-bottom form-control' placeholder='Product Quantity' required>
                    <label class='ps-2 m-2'>Product Image</label>
                    <input type='file' name='prodimage' class='form-control' accept='.png, .jpg, .jpeg' required>
                </div>
                <div class='modal-footer justify-content-ends'>
                    <button type='submit' name='addProduct' class='btn border-1 border-danger text-danger rounded-pill'><b>ADD PRODUCT </b></button>
                </div>
            </div>
        </div>
    </form>
</div>