$(document).ready(function() {
    getDebitData();
    pagination.getFn(getDebitData);
});

let DealerDetails  =  JSON.parse(userDataFromSessions);
let globalID = DealerDetails.data._id;


async function getDebitData() {
    pagination.paginationFn();
    const URL = base_url + 'Welcome/DebitNoteData/'+ globalID+'/'+pagination.activeIndex+'/7';
    console.log(URL);
    let response = await fetch(URL);
    response = await response.json();
    console.log(response);
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
            console.log(item.orderDetails);
            tableHTML += '<tr>' +
                    '<td>' + item.orderDetails.DealerCode + '</td>' +
                    '<td>' + item.orderDetails.name + '</td>' +
                    '<td>' + item.orderDetails.orderID + '</td>' +
                    '<td><a class="btn btn-sm btn-primary" href='+base_url+ 'Welcome/OrderInvoice?OrderID='+item.orderDetails.orderID+'>Generated</a></td>' +
                    '<td>' + '<i class="bx bx-rupee"></i>'+item.orderDetails.orderAmount + '</td>' +
                    '<td>' + fDate(item.orderDetails.bookingDate) + '</td>' +
                    '<td>' + item.orderDetails.reason + '</td>' +
                    '<td>' + item.orderDetails.debitAmount + '</td>' +
    
                    '</tr>';
        }
        $('#creditNote').html(tableHTML);
    }
}