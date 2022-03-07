$(document).ready(function() {
    getTotalProducts(limit);
    pagination.getFn(getTotalProducts);
});

let DealerDetails  =  JSON.parse(userDataFromSessions);
let globalID = DealerDetails.data._id;

let limit = 6;
let searchStr = '';

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
        $('#products').html(products);
        Makeresponse();
    }
}

function addItemInCart(productId, productName, price,ProductImage) {
    addToCart(productId, productName,price,ProductImage);
    getTotalProducts();
}

function Makeresponse()
{
    $('.responsive').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
}