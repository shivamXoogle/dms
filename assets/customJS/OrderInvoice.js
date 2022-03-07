$(document).ready(function() {
    getSingleOrder();
    checkPayment();
    $('#paymentForm').off().submit(e => {
        e.preventDefault();
        completePayment();
    });
});

let GlobalOrderID = OrderID;
let DataDealer = JSON.parse(userDataFromSessions);
let DefaultDealer = DataDealer.data._id;

let amountPaid = '';
let amountTotal = '';
async function getSingleOrder() {
    const URL = base_url + 'Welcome/SingleOrderData/' + GlobalOrderID;
    let response = await fetch(URL);
    response = await response.json();
    if(response.orderDetails) {
        let tableHTML = '';
        let table2Html = '';
        console.log(response);
        console.log(response.orderDetails.amountPaid)
        tableHTML += '<p>'+response.orderDetails.name+'</p>';
        tableHTML += '<p>'+response.orderDetails.email+'</p>';
        tableHTML += '<p>'+response.orderDetails.address+'</p>';
        tableHTML += '<p>'+response.orderDetails.EntityName+'</p>';
        $('#billedTo').html(tableHTML);
        $('#orderDate').html(fDate(response.orderDetails.bookingDate));
        $('#orderAmount').html(response.orderDetails.orderAmount);
        amountTotal = response.orderDetails.orderAmount;
        for(item of response.products)
        {
            table2Html += '<tr>'+
            '<td style="color:#000;">'+item.productID+'</td>'+
            '<td style="color:#000;">'+item.product.title+'</td>'+
            '<td style="color:#000;" class="text-end">'+item.quantity+'</td>'+
            '<td style="color:#000;" class="text-end">'+item.price * item.quantity+'</td>'+
        '</tr>';
  
        }
        if(response.orderDetails.coupoun == 'DMS1000')
        {
            $('#coupounDiscount').html(1000);
        }
        else
        {
            $('#coupounDiscount').html('No Coupon Applied');
        }
        $('#totalAmount').html(response.orderDetails.amountPaid);
        amountPaid = response.orderDetails.amountPaid;
        $('#productSummary').html(table2Html);
    }
}



async function completePayment() {
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
        getSingleOrder();
        checkPayment();
        alert('Payment Completed Successfully');
        window.location.href = base_url + 'Welcome/OrderInvoice?OrderID='+GlobalOrderID;
    }
    else
    {
        $('#paymentSpinner').hide();
        alert('Payment Failed');
    }
}

async function  checkPayment()
{
    const URL = base_url + 'Welcome/checkingPayment/'+GlobalOrderID;
    let response = await fetch(URL);
    response = await response.json();
    if(response.status == 200)
    {
        
        if(response.data.status == 'Completed')
        {
            $('#completePaymentBtn').html('Payment Completed');
            $('#completePaymentBtn').addClass('disabled');
        }
        else
        {
            $('#completePaymentBtn').html('Completed the Payment');
            $('#completePaymentBtn').removeClass('disabled');
        }
    }
}