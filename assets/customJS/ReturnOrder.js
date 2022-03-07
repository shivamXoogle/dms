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
    $('#returnForm').off().submit(e => {
        e.preventDefault();
        initiatedReturn();
    });
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
    const URL = base_url + 'Welcome/returnOrders/'+ globalID+'/'+pagination.activeIndex+'/7';
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
            let isVerified = item.orderStatus == 1 ? '<span>Active</span>' : '<span>Disabled</span>';
            let isReturned = item.returnStatus == 2 ? '<button class="btn btn-primary disabled btn-sm">Initiated for Return</button>' : '<button class="btn btn-primary btn-sm" onclick=\'viewModal(' + JSON.stringify(item) + ',' + item.orderAmount + ')\' >Intitate Return</button>';
            tableHTML += '<tr>' +
                    '<td>' + item.orderID + '</td>' +
                    '<td>' + item.name + '</td>' +
                    '<td>' + fDate(item.bookingDate) + '</td>' +
                    '<td>' + item.coupoun + '</td>' +
                    '<td>' + '<i class="bx bx-rupee"></i>'+item.orderAmount + '</td>' +
                    '<td>' + isVerified + '</td>' +
                    '<td>'+isReturned+'</td>' +
                    '</tr>';
        }
        $('#orderDetails').html(tableHTML);
    }
}
catch(error) {
    console.log(error);
}
}

function viewModal(item, price)
{   
    console.log(item);
    $('#returnModal').modal('show');
   $('#returnForm  input[name=orderID]').val(item.orderID);
}

async function initiatedReturn()
{   
    const Array = $('#returnForm').serializeArray();
    let data=  {};
    for (key of Array) {
        data[key.name] = key.value;
    }
    const ORDERID = data.orderID;
    const URL = base_url + 'Welcome/InitreturnOrder/'+ORDERID;
    let response = await fetch(URL);
    response = await response.json();
    console.log(response);
    if(response.status == 200)
    {
        getTotalOrder(); 
        $('#returnModal').modal('hide');
        alert('Return Initiated'); 
    }
    else
    {
        alert('Return Not  Initiated or Server Error');
    }
}