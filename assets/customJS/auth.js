$(document).ready(function () {
    $('#dealerForm').off().submit(e => {
        e.preventDefault();
        dealerLogin();
    });
});

async function dealerLogin() {
    const dealerArray = $('#dealerForm').serializeArray();
    let data = {};
    for (key of dealerArray) {
        data[key.name] = key.value;
    }
    const URL = base_url + 'Welcome/DelerLogin';
    const options = {
        method: 'POST',
        body: JSON.stringify(data)    
    }
    let response  = await fetch(URL,options);
    response = await response.json();
    if(response.status ==200)
    {
        window.location.href = base_url + 'Welcome/Dashboard';
    }
    else
    {
        alert('Invalid Credentials');
    }
}