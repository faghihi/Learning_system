/**
 * Created by hossein on 11/08/2016.
 */
//
// function checkold(){
//    // var oldpass=$('input[name="oldpass"]').val();
//     //console.log(oldpass);
//     alert('salam');
//     return false;
// }

function checkold() {
    //alert ("salam");
    var oldpass=$('input[name="oldpass"]').val();
    console.log(oldpass);
    $.ajax({url:"/Profile/Check?rand="+Math.random(),data:"oldpass="+oldpass, async:false ,success: function (data) {
        if(data==1){
            check= true;
        }
        else {
            check = false;
            alert('رمز را اشتباه وارد کرده اید ');
        }
        console.log(data);
    }});
    return check;
}