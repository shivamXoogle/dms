$(document).ready(function () {
    $('#serviceForm').off().submit(e => {
        e.preventDefault();
        createServiceRequest();
    });
    getServiceRequest();
    pagination.getFn(getServiceRequest);
});
let keyword = '';
async function createServiceRequest() {
    const Service = new FormData($('#serviceForm')[0]);
    const URL = base_url + 'Welcome/AddServiceRequest';
    const options = {
        method: 'POST',
        body: Service
    }
    let response = await fetch(URL, options);
    response = await response.json();
    console.log(response);
    if (response.status == 200) {
        alert('Service Request Created');
        window.location.href = base_url + 'Welcome/ServiceRequestView';
    }
    else
        alert('Server Error');
}

async function getServiceRequest() {
    pagination.paginationFn();
    const URL = base_url + 'Welcome/GetServiceRequest/' + pagination.activeIndex;
    let response = await fetch(URL);
    response = await response.json();
    if (response.status == 200 || response.status == 404) {
        pagination.total = response.total;
        pagination.limitPerPage = response.limit;
        pagination.activeIndex = response.page;
        pagination.paginationFn();
    }
    if (response.status == 200) {
        let tableHTML = '';
        for (value of response.data) {
            let { ServiceRequestID, createdAt, description, requestType, servicePhoto, status, subject } = value;
            let isVerified = status == 1 ? '<span>Pending</span>' : '<span>Completed</span>';
            tableHTML += '<tr>' +
                '<td>' + ServiceRequestID + '</td>' +
                '<td>' + requestType + '</td>' +
                '<td>' + subject + '</td>' +
                '<td>' + description + '</td>' +
                '<td><img src="' + servicePhoto + '" height="50px"></td>' +
                '<td>' + fDate(createdAt) + '</td>' +
                '<td><button class="btn btn-primary">' + isVerified + '</button></td>' +

                '</tr>';
        }
        $('#serviceRequest').html(tableHTML);
    }
}