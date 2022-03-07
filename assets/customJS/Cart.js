let CartProducts = [];
let limitPerProduct = 5;

function addToCart(productID, productName, productPrice, ProductImage, productQuantity) {
    let CartValue = localStorage.getItem('DealerManagement');
    if (CartValue == null) {
        //No Cart is Present
        let SingleCartProduct = { productID, productName, productPrice, ProductImage, productQuantity: 1 };
        CartProducts.push(SingleCartProduct);
        localStorage.setItem('DealerManagement', JSON.stringify(CartProducts));
        getTotalLength();
    }
    else {
        let findProduct = JSON.parse(CartValue);
        let oldProduct = findProduct.find((item => {
            item.productID == productID,
                item.productName == productName
        }));
        if (oldProduct) {
            //Already present
            alert('Product already ADDED');
        } else {
            //Add the new product 
            let SingleCartProduct = { productID, productName, productPrice,ProductImage, productQuantity: 1 };
            findProduct.push(SingleCartProduct);
            localStorage.setItem('DealerManagement', JSON.stringify(findProduct));
            getTotalLength();
        }
    }
}

function getTotalLength() {
    let CartValue = localStorage.getItem('DealerManagement');
    let totalLength = JSON.parse(CartValue);
    if(totalLength)
    $('#totalCartItems').html(totalLength.length);
}

function getAllItems() {
    let data = localStorage.getItem('DealerManagement');
    return JSON.parse(data);
}

function removeItem(productID) {
    let findProduct = JSON.parse(localStorage.getItem('DealerManagement'));
    let UpdateCart = findProduct.filter((item)=>item.productID != productID);
    localStorage.setItem('DealerManagement', JSON.stringify(UpdateCart));
    loadCartProducts();

}

function getTotalAmount() {
    let findProduct = JSON.parse(localStorage.getItem('DealerManagement'));
    let total = 0;
    for(item of findProduct) {
        total +=  Number(item.productPrice) * Number(item.productQuantity);
    }
    return total;
}

function updateItem(productID,value){

   let totalProduct = JSON.parse(localStorage.getItem('DealerManagement'));
    let findProduct = totalProduct.find((item)=>item.productID == productID);

    findProduct.productQuantity = value;
    totalProduct.map((item)=>{
        if(item.productID == findProduct.productID){
            item.productQuantity = findProduct.productQuantity
        }
    })
    localStorage.setItem('DealerManagement', JSON.stringify(totalProduct));
    loadCartProducts();
}

function checkProduct(productID){
    let ProductData = getAllItems();
    if(!ProductData)
        return false;
    for(item of ProductData){
        if(item.productID == productID){
        return true;
        }
    }
    return false;
}