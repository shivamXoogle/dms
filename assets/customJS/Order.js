$(document).ready(function() {
    getTotalProducts(limit);
    getTotalLength();
    getTotalOrder();
    $('#productLimit').on('change', function() {
       limit =  $('#productLimit').val();
       getTotalProducts();
    });
    $('#productColor').on('change', function() {
        let color = $('#productColor').val();
        getProductByColor(color);
    });
    $('#productSearch').on('keyup', function() {
        searchStr = $('#productSearch').val();
        getTotalProducts();
    });
    pagination.getFn(getTotalOrder);

});

let DealerDetails  =  JSON.parse(userDataFromSessions);
let globalID = DealerDetails.data._id;


let limit = 6;
let searchStr = '';
//PRODUCT BY LIMIT
async function getTotalProducts() {
    const URL = base_url + 'Welcome/totalProducts?limit='+limit + '&search=' + searchStr;
    let response = await fetch(URL);
    response = await response.json();
    if(response.status == 200)
    {
        let products = '';
        for(value of response.data) {
            let {ProductID,Price,Color,ProductImage,ProductName,Size} = value;
            const isProductThere = checkProduct(ProductID);
            const btn = '<button  onclick= "addItemInCart('+ ProductID+',\''+ ProductName +'\','+Price+',\''+ ProductImage +'\'  )"  class="btn btn-primary ' + (isProductThere ? 'disabled' : '') +'" >' + (isProductThere ? 'Added to Cart' : 'Add to Cart') + ' <i class="bx bxs-cart" ></i></button>'
            products += '<div class="col-lg-4">'+
            '<div class="card">'+
                '<img src="'+ProductImage+'" class="card-img-top" alt="...">'+
                '<div class="card-body">'+
                    '<h5 class="card-title">'+ProductName+'</h5>'+
                    '<p class="card-text">Some quick example text </p>'+
                    btn +
                '</div>'+
           '</div>'+
        '</div>';
        }
        $('#productsData').html(products);
    }
}

function addItemInCart(productId, productName, price,ProductImage) {
    addToCart(productId, productName,price,ProductImage);
    getTotalProducts();
    getProductByColor();
    getTotalLength();
}

//PRODUCT BY COLOR
async function getProductByColor(color) {
    const URL = base_url + 'Welcome/totalProductsBYCOLOR?color='+color;
    let response = await fetch(URL);
    response = await response.json();
    if(response.status == 200)
    {
        let products = '';
        for(value of response.data) {
            let {ProductID,Price,Color,ProductImage,ProductName,Size} = value;
            const isProductThere = checkProduct(ProductID);
            const btn = '<button  onclick= "addItemInCart('+ ProductID+',\''+ ProductName +'\','+Price+',\''+ ProductImage +'\'  )"  class="btn btn-primary ' + (isProductThere ? 'disabled' : '') +'" >' + (isProductThere ? 'Added to Cart' : 'Add to Cart') + ' <i class="bx bxs-cart" ></i></button>'
            products += '<div class="col-lg-4">'+
            '<div class="card">'+
                '<img src="'+ProductImage+'" class="card-img-top" alt="...">'+
                '<div class="card-body">'+
                    '<h5 class="card-title">'+ProductName+'</h5>'+
                    '<p class="card-text">Some quick example text </p>'+
                    btn+
                '</div>'+
           '</div>'+
        '</div>';
        }
        $('#productsData').html(products);
    }
}

async function getTotalOrder() {
    try{
    pagination.paginationFn();
    const URL = base_url + 'Welcome/totalOrders/'+ globalID+'/'+pagination.activeIndex+'/7';
    let response = await fetch(URL);
    console.log(URL);
    response = await response.json();
    if (response.status == 200 || response.status == 404) {
        pagination.total = response.total;
        pagination.limitPerPage = response.limit;
        pagination.activeIndex = response.page;
        pagination.paginationFn();
    }
    if(response.status == 200) {
        let tableHTML = '';
        for(item of response.data)
        {
            let orderDetails = item.orderDetails;
            let productsDetails = item.products;
            let isVerified = orderDetails.orderStatus == 1 ? '<span>Active</span>' : '<span>Disabled</span>';
            tableHTML += '<tr>' +
                    '<td>' + orderDetails.orderID + '</td>' +
                    '<td>' + orderDetails.name + '</td>' +
                    '<td>' + orderDetails.bookingDate + '</td>' +
                    '<td>' + orderDetails.coupoun + '</td>' +
                    '<td>' + '<i class="bx bx-rupee"></i>'+orderDetails.orderAmount + '</td>' +
                    '<td>' + isVerified + '</td>' +
                    '<td><button class="btn btn-primary btn-sm" onclick=\'viewModal(' + JSON.stringify(productsDetails) + ',' + orderDetails.orderAmount + ')\' >View Products</button></td>' +
                    '</tr>';
        }
        $('#orderDetails').html(tableHTML);
    }
}
catch(error) {
    console.log(error);
}
}

function viewModal(productDetails, price)
{   
    $('#productsModal').modal('show');
    let tableHTML = '';
    for (item of productDetails) {
        let products = item.product;
        tableHTML += '<tr>' +
        '<td>' + products.id + '</td>' +
        '<td>' + products.title + '</td>' +
        '<td>' + products.price + '</td>' +
        '<td>' + item.quantity + '</td>' +
        '</tr>';
    }
    $('#productDesc').html(tableHTML);

}