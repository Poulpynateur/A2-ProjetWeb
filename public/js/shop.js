/**
 * Filter in function :
 * - Search by name
 * - Filter by categories
 */
function shopFilter() {
    $('#shop-best-sellers').addClass('d-none');
    $('#shop-search-result').removeClass('d-none');

    var goodies = [];
    $('.shop-goodie').each(function() {
        goodies.push($(this).data('goodie'));
    });

    var checkedFilter = [];
    $("input[name='category-filter']:checked").each(function () {
        checkedFilter.push($(this).val());
    });

    goodies.forEach(function(element) {
        $('#shop-goodie-'+element[0]).removeClass('d-none');

        if(checkedFilter.length > 0 && !checkedFilter.includes(element[3]))
            $('#shop-goodie-'+element[0]).addClass('d-none');

        if(!(parseInt(element[2]) <= $('#category-filter-priceMax').val() && parseInt(element[2]) >= $('#category-filter-priceMin').val()))
            $('#shop-goodie-'+element[0]).addClass('d-none');
    });
}
/**
 * Search in function of name
 */
$('#shop-search').change(function () {
    $('#shop-best-sellers').addClass('d-none');
    $('#shop-search-result').removeClass('d-none');

    var goodies = [];
    $('.shop-goodie').each(function() {
        goodies.push($(this).data('goodie'));
    });

    var search = $('#shop-search').val();
    goodies.forEach(element => {
        $('#shop-goodie-'+element[0]).removeClass('d-none');
        if(search != '' && !element[1].toLowerCase().includes(search.toLowerCase()))
            $('#shop-goodie-'+element[0]).addClass('d-none');
    });
});

/**
 * Add a goodie to the cart
 * @param goodieID target goodie ID
 * @param elementID quantity input
 */
function addToCart(goodieID, elementID) {
    var quantity = $(elementID).val();
    sendPostAjax('/addToCart', JSON.stringify({
        id_goodie: goodieID,
        quantity: quantity,
        _token: CSRF_TOKEN
    }), null,'JSON', 'POST');
}

/**
 * Send and validate a order
 * @param orderID order to validate
 */
function sendOrder(orderID) {
    sendPostAjax('/sendOrder', JSON.stringify({
        id_order: orderID,
        _token: CSRF_TOKEN
    }), function() {
        location.reload();
    },'JSON', 'POST');
}