$(function () {
  $(".navbar-toggler").click(function () {
    $("body").toggleClass("noscroll");
  });
});
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
  scroll();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("movetop").style.display = "none";
  } else {
    document.getElementById("movetop").style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
$(function () {
  var dtToday = new Date();
  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate();
  var year = dtToday.getFullYear();
  if (month < 10) month = "0" + month.toString();
  if (day < 10) day = "0" + day.toString();
  var maxDate = year + "-" + month + "-" + day;
  $("#adate").attr("min", maxDate);
});
$(function () {
  $(".navbar-toggler").click(function () {
    $("body").toggleClass("noscroll");
  });
});

function checkpass() {
  if (
    document.changepassword.newpassword.value !=
    document.changepassword.confirmpassword.value
  ) {
    alert("New Password and Confirm Password field does not match");
    document.changepassword.confirmpassword.focus();
    return false;
  }
  return true;
}




