function deleteDoc(string) {
    for(let i = 0; i < string.length; i++) {
        if(string.charAt(i) === ',') {
            string = string.slice(0, i) + string.slice(i+1);
        }
    }
    return string;
}

function addDoc(string) {
    index = string.length;
    for(let i = string.length-1; i > 0; i--) {
        if(i % 3 === 0) {
            string = string.slice(0, string.length-i) + ',' + string.slice(string.length-i);
        }
    }
    return string;
}

$(document).ready(function() {
    $( "#totalOrderRevenue" ).change(function() {
        if($(this).is(':checked')) {
            $(".orderRevenue").prop("checked", true);
            totalPrice = 0;
            $(".tbody .orderPrice").each(function() {
                totalPrice = totalPrice + Number(deleteDoc($(this).html()));
            });
            totalPrice = String(totalPrice);
            totalPrice = addDoc(totalPrice);
            $('#totalPriceOrderRevenue').html(totalPrice);
        } else {
            $(".orderRevenue").prop("checked", false);
            $('#totalPriceOrderRevenue').html("0");
        } 
    });
    $( ".orderRevenue" ).change(function() {
        if($(this).is(':checked')) {
            $(this).attr("checked", "checked");
            let totalPrice = $('#totalPriceOrderRevenue').html();
            totalPrice = deleteDoc(totalPrice);
            totalPrice = Number(totalPrice);
            let orderPrice = $(this).val();
            orderPrice = deleteDoc(orderPrice);
            orderPrice = Number(orderPrice);
            totalPrice += orderPrice;
            totalPrice = String(totalPrice);
            totalPrice = addDoc(totalPrice);
            $('#totalPriceOrderRevenue').html(totalPrice);
        } else {
            $(this).removeAttr("checked", "checked");
            let totalPrice = $('#totalPriceOrderRevenue').html();
            totalPrice = deleteDoc(totalPrice);
            totalPrice = Number(totalPrice);
            let orderPrice = $(this).val();
            orderPrice = deleteDoc(orderPrice);
            orderPrice = Number(orderPrice);
            totalPrice -= orderPrice;
            totalPrice = String(totalPrice);
            totalPrice = addDoc(totalPrice);
            $('#totalPriceOrderRevenue').html(totalPrice);
            $(this).attr("checked", "checked");
        }
    });
});    
