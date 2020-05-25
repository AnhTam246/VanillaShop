//lightSlider
$(document).ready(function() {
    $('#light-slider').lightSlider({
        gallery:true,
        item:1,
        thumbItem:9,
        slideMargin: 0,
        speed:500,
        auto:true,
        loop:true,
        onSliderLoad: function() {
            $('#light-slider').removeClass('cS-hidden');
        }  
    });
});

//quantity
$(document).ready(function() {
    var value = $('.input-qty').val();
    value = Number(value);
    $('.qtyminus').on('click', function() {
        value -= 1;
        if(value === 1) {
            $(".qtyminus").attr( "disabled", "disabled" );
        }
        if(value < 100) {
            $(".qtyplus").removeAttr("disabled");
        }
        $('.input-qty').val(value);
    })

    $('.qtyplus').on('click', function() {
        value += 1;
        if(value > 1) {
            $('.qtyminus').removeAttr("disabled");
        }
        if(value === 100) {
            $(".qtyplus").attr( "disabled", "disabled" );
        }
        $('.input-qty').val(value);
    })
});
