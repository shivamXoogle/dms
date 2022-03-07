$(document).ready(function() {
    getTotalOrdersData();
    pagination.getFn(getTotalOrdersData);
    $('#paymentForm').off().submit(e =>{
        e.preventDefault();
        completePayment();
    });
});

let DealerDetails  =  JSON.parse(userDataFromSessions);
let globalID = DealerDetails.data._id;

const InvoiceURL = base_url + 'Welcome/OrderInvoice';
let searchStr = '';
async function getTotalOrdersData() {
    try{
        pagination.paginationFn();
        const URL = base_url + 'Welcome/totalOrders/'+ globalID+'/'+pagination.activeIndex+'/7';
        console.log(URL);
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
                console.log(item);
                let orderDetails = item.orderDetails;
                let btn = orderDetails.orderAmount != orderDetails.amountPaid ? '<button class="btn btn-danger" onClick=openModal('+orderDetails.orderID+');>Complete the Payment</button>' : '<button class="btn btn-success disabled">Payment Completed</button>';
                tableHTML += '<tr>' +
                        '<td>' + orderDetails.orderID + '</td>' +
                        '<td>' + orderDetails.name + '</td>' +
                        '<td>' + orderDetails.bookingDate + '</td>' +
                        '<td>' + orderDetails.coupoun + '</td>' +
                        '<td>' + '<i class="bx bx-rupee"></i>'+orderDetails.orderAmount + '</td>' +
                        '<td>' + '<i class="bx bx-rupee"></i>'+orderDetails.amountPaid  + '</td>' +
                        '<td>' + '<i class="bx bx-rupee"></i>'+Number(orderDetails.orderAmount-orderDetails.amountPaid) + '</td>' +
                        '<td>' + btn  + '</td>' +
                        '</tr>';
            }
            $('#orderDetails').html(tableHTML);
        }
    }
    catch(error) {
        console.log(error);
    }
}
function openModal(orderID) {
    $('#examplePaymentModal').modal('show');
    $('#orderID').html('#'+orderID);
    $('#OrderID2').val(orderID);
}

async function completePayment()
{
    const payment = new FormData($('#paymentForm')[0]);
    const URL = base_url + 'Welcome/completePayment';
    const options = {
        method: 'POST',
        body: payment
    }
    $('#paymentSpinner').show();
    let response = await fetch(URL,options);
    response = await response.json();
    if(response.status == 200) {
        $('#paymentSpinner').hide();
        getTotalOrdersData();
        alert('Payment Completed Successfully');
        window.location.href = base_url +'Welcome/OutStanding';
    }
    else
    {
        $('#paymentSpinner').hide();
        alert('Payment Failed');
    }
}