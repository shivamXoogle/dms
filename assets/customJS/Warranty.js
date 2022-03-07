$(document).ready(function() {
    getTotalOrder();
    pagination.getFn(getTotalOrder);
    $('#searchPro').on('keyup', function () {
        pagination.activeIndex = 0;
        keyword = $('#searchPro').val();
        getTotalOrder();
    });
    $('#wararntyForm').off().submit(e => {
        e.preventDefault();
        submitWarranty();
    });
});

let DealerDetails  =  JSON.parse(userDataFromSessions);
let globalID = DealerDetails.data._id;
let keyword = '';

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
                    '<td>' + fDate(orderDetails.bookingDate) + '</td>' +
                    '<td><button class="btn btn-primary btn-sm" onclick=\'viewModal(' + JSON.stringify(productsDetails) + ',' + orderDetails.orderAmount + ')\' >View Products</button></td>' +
                    '<td>' + '<i class="bx bx-rupee"></i>'+item.orderDetails.orderAmount + '</td>' +
                    '<td><button class="btn btn-primary btn-sm" onclick=openWarranyModal('+orderDetails.orderID+')>Claim Now</button></td>'
                    '</tr>';
        }
        $('#warranty').html(tableHTML);
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

function openWarranyModal(orderID)
{
    console.log(orderID)
    $('#warrantModal').modal('show');
    $('#wararntyForm input[name=orderID]').val(orderID);
}

async function submitWarranty()
{
    const warranty = new FormData($('#wararntyForm')[0]);
    const URL = base_url + 'Welcome/completeWarranty';
    const options = {
        method: 'POST',
        body: warranty
    }
    let response = await fetch(URL,options);
    response = await response.json();
    if(response.status==200 )
    {
        $('#warrantModal').modal('hide');
        alert('Claimed');
    }
    else
    {
        alert('Server Error');
    }

}