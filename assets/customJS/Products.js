$(document).ready(function () {
    fetchProducts();
    pagination.getFn(fetchProducts);
    $('#searchPro').on('keyup', function () {
        pagination.activeIndex = 0;
        keyword = $('#searchPro').val();
        fetchProducts();
    });
});

let keyword = '';

async function fetchProducts() {
    try {
        let searchKey = keyword ? '?search=' + keyword : '';
        pagination.paginationFn();
        const URL = base_url + 'Welcome/GetProductsData/' + pagination.activeIndex + '/5/' + searchKey;
        let response = await fetch(URL);
        response = await response.json();
        console.log(response);
        if (response.status == 200 || response.status == 404) {
            pagination.total = response.total;
            pagination.limitPerPage = response.limit;
            pagination.activeIndex = response.page;
            pagination.paginationFn();
        }
        if (response.status == 200) {
            let tableData = '';
            for (value of response.data) {
                let { ProductID,ProductImage, ProductName, Price, Size ,Color,createdAt} = value;
                tableData += "<tr>" +
                    "<td>" + ProductID + "</td>" +
                    "<td>" + ProductName + "</td>" +
                    "<td><img src ='" + ProductImage + "' class='mr-3' height='80px' ></td>" +
                    "<td>" + '<i class="bx bx-rupee"></i>'+Price + "</td>" +
                    "<td>" + Size + "</td>" +
                    "<td>" + Color + "</td>" +
                    '<td> ' + fDate(createdAt)+ '</td>' +
                    "</tr>";
            }
            $('#productsData').html(tableData);
        }
    }

    catch (err) {
        console.log(err);
    }
}