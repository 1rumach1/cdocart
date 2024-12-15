let itemQuan = document.getElementById('quan');

function minusQuan() {
    if (parseInt(itemQuan.value) > 1) {
        itemQuan.value = parseInt(itemQuan.value) - 1;
    }
}

function plusQuan() {
    let maxQuan = parseInt(itemQuan.getAttribute('max'));

    if (parseInt(itemQuan.value) < maxQuan) {
        itemQuan.value = parseInt(itemQuan.value) + 1;
    }
}