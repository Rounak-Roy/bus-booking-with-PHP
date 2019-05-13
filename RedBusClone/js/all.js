function change() {
  document.getElementById('button').addEventListener('click',function() {
    document.querySelector('.bg-modal').style.display = 'flex';
  });
}

function changeLogin() {
  document.getElementById('signup').addEventListener('click',function() {
    document.querySelector('.bg-modal-signup').style.display = 'flex';
  });
}

function changeBus() {
  var y = document.getElementById("box-bus");
  var x = document.getElementById("wrap");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function cancel() {
  document.querySelector('.close').addEventListener('click',function(){
    document.querySelector('.bg-modal').style.display = 'none';
  });
}

function cancelSignup() {
  document.querySelector('.close-signup').addEventListener('click',function(){
    document.querySelector('.bg-modal-signup').style.display = 'none';
  });
  location.replace('index.php');
}

function cancelBus() {
  document.querySelector('.close-bus').addEventListener('click',function(){
    document.querySelector('.bg-modal-bus').style.display = 'none';
  });
}

function checkPassword() {
  if(document.getElementById('password').value != document.getElementById('rePassword').value){
    document.getElementById('password').value = "";
    document.getElementById('rePassword').value = "";
    document.getElementById('password').focus();
  }
}

function chk_ft(str)
{
		//alert(str);
		var s = document.getElementById("from").value;
		var d = document.getElementById("to").value;

		if(s == d)
		{
			alert("Source and Destination can not be Same");
			document.getElementById(str).select();
		}

}
