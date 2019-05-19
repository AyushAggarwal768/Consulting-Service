/*********** Function Check for Integer *************************/
//alert('calling');
function CheckForIntegers(i)
{
    if(i.value.length>0)
    {
        i.value = i.value.replace(/[^\d]+/g, '');

    }
}


/***************** Function Check For Float *****************************/

function CheckForFloat(i)
{
    if(i.value.length>0)
    {
        i.value = i.value.replace(/[^\d\.]+/g, '');
    }
}
/******************** Function For Check Email Validation**************************/

function validateEmail() {
    //alert('calling');
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    var address = document.getElementById('txtEmailID').value;
    if(reg.test(address) == false) {
        alert('Invalid Email Address');
        return false;
    }
}
