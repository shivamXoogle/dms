$(document).ready(function () {
    getTotalOrder();
    pagination.getFn(getTotalOrder);
});

let DealerDetails  =  JSON.parse(userDataFromSessions);
let globalID = DealerDetails.data._id;

async function getTotalOrder() {
    try {
        pagination.paginationFn();
        const URL = base_url + 'Welcome/totalOrders/' + globalID + '/' + pagination.activeIndex + '/5';
        let response = await fetch(URL);
        console.log(URL);
        response = await response.json();
        if (response.status == 200 || response.status == 404) {
            pagination.total = response.total;
            pagination.limitPerPage = response.limit;
            pagination.activeIndex = response.page;
            pagination.paginationFn();
        }
        if (response.status == 200) {
            let tableHTML = '';
            for (item of response.data) {
                let orderDetails = item.orderDetails;
                let isVerified = orderDetails.orderStatus == 1 ? '<span>Active</span>' : '<span>Disabled</span>';
                tableHTML += '<tr>' +
                '<td>' + fDate(orderDetails.bookingDate) + '</td>' +
                    '<td>' + orderDetails.orderID + '</td>' +
                    '<td>' + orderDetails.name + '</td>' +
                    '<td>' +'<i class="bx bx-rupee"></i>'+ orderDetails.orderAmount + '</td>' +
                    '<td>' + isVerified + '</td>' +
                    '</tr>';
            }
            $('#transaction').html(tableHTML);
        }
    }
    catch (error) {
        console.log(error);
    }
}