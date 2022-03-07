$(document).ready(function() {
    getDealerProfile(dealerID);
    $('#EditdealerProfile').off().submit(e => {
        e.preventDefault();
        editProfile();
    });
});

let gloabal = JSON.parse(userDataFromSessions);
let dealerID = gloabal.data._id;

async function getDealerProfile(dealerID)
{
    const url = base_url + 'Welcome/generateSession/'+dealerID;
    let response = await fetch(url);
    response = await response.json();
    if(response.status == 200){
        console.log(response.data);
        $('#dealerID').val(response.data._id);
        $('#dealerProfile  input[name=name]').val(response.data.name);
        $('#dealerProfile  input[name=email]').val(response.data.email);
        $('#dealerProfile  input[name=title]').val(response.data.title);
        $('#dealerProfile  input[name=EntityName]').val(response.data.EntityName);
        $('#dealerProfile  input[name=DistributorType]').val(response.data.DistributorType);
        $('#dealerProfile  textarea[name=aboutMe]').val(response.data.aboutMe);
        $('#dealerProfile  textarea[name=address]').val(response.data.address);
        $('#dealerProfile  input[name=mobile]').val(response.data.mobile);
        $('#dealerProfile  input[name=EntityType]').val(response.data.EntityType);
        $('#EditdealerProfile  input[name=name]').val(response.data.name);
        $('#EditdealerProfile input[name=email]').val(response.data.email);
        $('#EditdealerProfile  input[name=title]').val(response.data.title);
        $('#EditdealerProfile  input[name=EntityName]').val(response.data.EntityName);
        $('#EditdealerProfile  input[name=DistributorType]').val(response.data.DistributorType);
        $('#EditdealerProfile  textarea[name=aboutMe]').val(response.data.aboutMe);
        $('#EditdealerProfile  textarea[name=address]').val(response.data.address);
        $('#EditdealerProfile  input[name=mobile]').val(response.data.mobile);
        $('#EditdealerProfile  input[name=EntityType]').val(response.data.EntityType);
    }
}

async function  editProfile()
{
    const dealerArray = $('#EditdealerProfile').serializeArray();
    let data=  {};
    for (key of dealerArray) {
        data[key.name] = key.value;
    }
    const URL = base_url + 'Welcome/editProfile';
    const option = {
        method: 'POST',
        body: JSON.stringify(data)
    }
    let response = await fetch(URL,option);
    response = await response.json();
    if(response.status)
    {
        $('#close').click();
        $('#EditdealerProfile').trigger('reset');
        getDealerProfile(dealerID);
    }
    else
    {
        alert('Server Failed');
    }

}