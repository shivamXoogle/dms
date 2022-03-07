$(document).ready(function() {
    getTotalOrdersData();
    pagination.getFn(getTotalOrdersData);
    
});

let DealerDetails  =  JSON.parse(userDataFromSessions);
let globalID = DealerDetails.data._id;

const InvoiceURL = base_url + 'Welcome/OrderInvoice';
let searchStr = '';
async function getTotalOrdersData() {
    try{
        pagination.paginationFn();
        const URL = base_url + 'Welcome/totalOrders/'+ globalID+'/'+pagination.activeIndex+'/7';
        let response = await fetch(URL);
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
                let isVerified = orderDetails.orderStatus == 1 ? '<span>Active</span>' : '<span>Disabled</span>';
                tableHTML += '<tr>' +
                        '<td>' + orderDetails.orderID + '</td>' +
                        '<td>' + orderDetails.name + '</td>' +
                        '<td>' + orderDetails.bookingDate + '</td>' +
                        '<td>' + orderDetails.coupoun + '</td>' +
                        '<td>' + '<i class="bx bx-rupee"></i>'+orderDetails.orderAmount + '</td>' +
                        '<td>' + isVerified + '</td>' +
                        '<td><a class="btn btn-primary btn-sm" href='+base_url+'Welcome/OrderInvoice?OrderID='+orderDetails.orderID+''+'>Generate Invoice</a></td>' +
                        '</tr>';
            }
            $('#orderDetails').html(tableHTML);
        }
    }
    catch(error) {
        console.log(error);
    }
}