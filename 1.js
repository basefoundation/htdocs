function myEvaluate(){
    if(document.myForm.tickets.value < document.myForm.childrens.value){

       window.alert("No of tickets should be greater than the no of children");
       document.myForm.children.focus();
       return false;
    }

    var today = new Date().toISOString().split('T')[0];
    var ipStr = document.myForm.shodate.value;
    var ip = new Date(ipStr).toISOString().split('T')[0];
    if(ip<today){
      window.alert("Show date and time should be either current date or future date");
      document.myForm.showdate.focus();
      return false;
    }

    var totalTix = document.myForm.tickets.value;
    var childTix = document.myForm.childrens.value;
    var adultTix = totalTix - childTix;
    var totalFare = (adultTix*200) + (childTix*100);
    alert("Your approximate ticket amount is "+totalFare+ "INR");

    return (true);
}