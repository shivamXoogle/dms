$(document).ready(function() {
    loadCartProducts();
    loadCartProducts2();

    let newAmountAfterCoupoun = '';
    $('#CreateOrder').click(function() {
        if(confirm('Are you sure you want to create order'))
        {
        $('#OrderModal').modal('show');
        loadCartProducts2();
        }
        else
        alert('No Problem');
    });
    $('#couponApply').on('keyup', function() {
        if($('#couponApply').val().trim() == coupoun)
        {
            const prevalue = getTotalAmount();
            newAmountAfterCoupoun = Number(prevalue) - 1000;
            $('#totalAmount2').text('INR '+newAmountAfterCoupoun);
        }
        else
        {
            
            $('#totalAmount2').html('INR ' +  getTotalAmount());
        }

    });
    $('#ConfirmOrder').click(function() {
        if(newAmountAfterCoupoun == '')
        {
            newAmountAfterCoupoun = getTotalAmount();
        }
        const items = getAllItems();
        let products = [];
        for(item of items) {
            products.push({
                quantity : item.productQuantity,
                productID : item.productID,
                price:item.productPrice
            });
        }
        const data = {
            products : products,
            coupoun : $('#couponApply').val().trim(),
            globalID:globalID,
            orderAmount:newAmountAfterCoupoun,
            
        };
        createDealerOrder(data);

    });
});


let DealerDetails  =  JSON.parse(userDataFromSessions);
let globalID = DealerDetails.data._id;


let coupoun = 'DMS1000';

async function loadCartProducts() {
    let products = getAllItems();
    let cartHTML = '';
    if (products) {
        for (item of products) {
            console.log(item);
            cartHTML += '<div class="cartPanel  m-3 p-3 rounded">' +
                '<div class="row">' +
                '<div class="col-lg-6">' +
                '<img src="'+item.ProductImage+'" class="img-fluid">'+
                '<h2>' + item.productName + '</h2>' +
                '<h6>' + 'Price:  '+ item.productPrice + '</h6>' +
                '<h6>' + 'Quantity:  '+ item.productQuantity + '</h6>' +
                '<h6>' + 'Size: M'+'</h6>' +
                '</div>' +
                '<div class="col-lg-6">' +
                '<div class="form-group mt-4">' +
                '<select class="form-control" onChange="updateItem(' + item.productID + ',this.value)">' +
                '<option ' + (item.productQuantity == 1 ? 'selected' : '') + ' value="1">1</option>' +
                '<option ' + (item.productQuantity == 2 ? 'selected' : '') + ' value="2">2</option>' +
                '<option ' + (item.productQuantity == 3 ? 'selected' : '') + ' value="3">3</option>' +
                '<option ' + (item.productQuantity == 4 ? 'selected' : '') + ' value="4">4</option>' +
                '<option ' + (item.productQuantity == 5 ? 'selected' : '') + ' value="5">5</option>' +
                '</select>' +
                '<button class="btn btn-danger btn-sm mt-3" onclick=\'removeItem('+item.productID+')\'  id="btnRemove">Remove</button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
        }
        $('#cartProducts').html(cartHTML);
        $('#totalAmount').html('INR ' +  getTotalAmount());
    }
    else {
        let error = '<h1>Your Cart is Very Light</h1>';
        $('#cartProducts').html(error);
    }
}



async function loadCartProducts2() {
    let products = getAllItems();
    let cartHTML = '';
    if (products) {
        for (item of products) {
            cartHTML += '<div class="cartPanel  m-3 p-3 rounded">' +
                '<div class="row">' +
                '<div class="col-lg-12">' +
                '<h4>' + item.productName + '</h4>' +
                '<h6>' + 'Price:  '+ item.productPrice + '</h6>' +
                '<h6>' + 'Price:  '+ item.productQuantity + '</h6>' +
                '</div>' +
                '</div>' +
                '</div>';
        }
        $('#cartProductsSummary').html(cartHTML);
        $('#totalAmount2').html('INR ' +  getTotalAmount());
    }
    else {
        let error = '<h1>Your Cart is Very Light</h1>';
        $('#cartProducts').html(error);
    }
}


async function createDealerOrder(data) {
     const URL = base_url + 'Welcome/CreateDealerOrder';
        const option = {
            method : 'POST',
            body: JSON.stringify(data)
        }
        console.log(data);
        $('#orderSpinner').show();
        let response = await fetch(URL,option);
        console.log(response);
        response = await response.json();
        if(response.status == 200) {
            $('#orderSpinner').hide();
            $('#OrderModal').modal('hide');
            alert('Order created successfully');
            localStorage.removeItem('DealerManagement');
            window.location.href = base_url + 'Welcome/ViewOrder';
        }
        else
        {
            alert('Order Not Created');
            $('#orderSpinner').hide();
        }
     
}