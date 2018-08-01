function validate()        
{
    var z=document.forms["myForms"]["showdate"].value;
    var x=document.forms["myForms"]["tickets"].value;
    var y=document.forms["myForms"]["childrens"].value;
    if(y>x)
    {
        alert("No of tickets should be greater than the no of children");
    }
    var date=z.substring(0,2);
    var month=z.substring(3,5);
    var year=z.substring(6,10);
    var myDate=new Date(year,month-1,date);
    var today= new Date();
    if(myDate>today)
    {
        alert("Show date and time should be either current date or future date");
    }
    return false;
} 

function ticketprice()
{
    var x=document.forms["myForms"]["tickets"].value;
    var y=document.forms["myForms"]["childrens"].value;
    var ticketfare=(x*200)-(y*100);
    alert("Your approximate ticket amount is "+ticketfare+" INR");
    return true;
}