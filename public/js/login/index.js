// Toggle Function
$('.toggle').click(function(){
  // Switches the Icon
  $(this).children('i').toggleClass('fa-pencil');
  $(this).children('div.tooltips').toggle();
  // Switches the forms  
  $('.form').animate({
    height: "toggle",
    'padding-top': 'toggle',
    'padding-bottom': 'toggle',
    opacity: "toggle"
  }, "slow");
});

function checklogin() {
  var pass=$("#pass").val();
  var repass=$("#repass").val();
  if(pass==repass)
  {
    var check=false;
    var username=$("input[name='username']").val();
    var email=$("input[name='email']").val();
    console.log(username);
    $.ajax({url:"/SignUp/Check?mail="+email+"&rand="+Math.random(),data:"user="+username, async:false ,success: function (data) {
        if(data==1){
          check= true;
        }
      else {
          check = false;
        }
      console.log(data);
    }});
    if(!check){
      $("form").eq(1).prepend(
          '<p style="Color:Red;">نام کاربری یا ایمیل وارد شده ی  شما قبلا توسط شخص دیگری استفاده شده است </p>'
      );
    }
    return check;
  }
  else {
    $("form").eq(1).prepend(
      '<p style="Color:Red;">رمز عبور و تکرار آن مطابقت ندارد</p>'
    );
    return false;
  }
}