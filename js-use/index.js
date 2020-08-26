function register() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    var Department = document.getElementById("Department").value;
    console.log(username);
    console.log(password);
    console.log(name);
    console.log(lastname);
    console.log(Department);
    $.ajax({
        type: "POST",
        url: "register.php",
        data: { "username": username, "password": password, "name": name, "lastname": lastname, "Department": Department },
        success: function(data) {
            // alert('wow' + data);
            Swal.fire(
                    'Good job!',
                    'สมัครสมาชิกเสร็จสิ้น!',
                    'success')
                    setTimeout(function(){
        location.reload();
          },3000);  
        }
    });
}
function checkusernme(){

var username = document.getElementById("username").value;
console.log(username);
$.ajax({
type:"POST",
url:"checkusername.php",
data:{"username":username},
success: function(data){
 if(data == 1){
  Swal.fire({
  icon: 'error',
  title: 'ชื่อผู้ใช้นี้มีผู้ใช้แล้ว...',

});
document.getElementById("username").value =" ";
 }
 else{

  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'ชื่อผู้ใช้นี้สามรถใช้งานได้',
  showConfirmButton: false,
  timer: 1500
});


 }
}

});
}

function checkpassword(){
var password = document.getElementById("password").value;
console.log(password);
var pass =  /^[A-Za-z]\w{7,14}$/;
if(password.match(pass)){
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'รหัสสามารถใช้งานได้',
  showConfirmButton: false,
  timer: 1500
});


}
else{

  Swal.fire({
  icon: 'error',
  title: 'รหัสไม่ปลอดภัย...',

});
document.getElementById("password").value ="";
}}

function selectposition(){

var Department =document.getElementById("Department").value;
console.log(Department);
$.ajax({

  type: 'POST',
 data: {"Department":Department},
  url: 'select_position.php',
  success: function(data) {
   //alert("data : ",data);
   $('#position').html(data);     
   //$('#results').html(data);
                          }

});


}

function selectpositiondetail(){
var position = document.getElementById("position").value;
console.log(position);
$.ajax({
  type: 'POST',
 data: {"position":position},
  url: 'select_position_detail.php',
  success: function(data) {
   //alert("data : ",data);
   $('#position_detail').html(data);     
   //$('#results').html(data);
  }




});



}