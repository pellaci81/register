
function check() {
	var rendben = true;

	//********************************************************
	//* Név ellenőrzése               						 *
	//********************************************************

	var nev = document.getElementById("nev");
	if (nev) {
		if (nev.value.length < 8 || nev.value.length > 30) {
				rendben = false;
				nev.style.background = '#fad0d0';
		} else {
			nev.style.background = '#d1f8d1';
		}
	}

	//********************************************************
	//* Emil ellenőrzése               						 *
	//********************************************************

	var email = document.getElementById("email");
	if (email) {
		var checkPattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if (!checkPattern.test(email.value)) {
			rendben = false;
			email.style.background = '#fad0d0';
		} else {
			email.style.background = '#d1f8d1';
		}
	}

	//********************************************************
	//* Jelszó ellenőrzése               					 *
	//********************************************************

	var pwd = document.getElementById("pwd");
	if (pwd) {

		if (pwd.value.length < 6 || pwd.value.length > 12)
		{
			rendben = false;
			pwd.style.background = '#fad0d0';
		} else {
			pwd.style.background = '#d1f8d1';
		}
	}


	//********************************************************
	//* Kor ellenőrzése               						 *
	//********************************************************


	var kor = document.getElementById("kor");
	if (kor) {

		if (kor.value < 18 || kor.value > 100)
		{
			rendben = false;
			kor.style.background = '#fad0d0';
		} else {
			kor.style.background = '#d1f8d1';
		}
	}

	//********************************************************
	//* Nem ellenőrzése               						 *
	//********************************************************


	var nem = document.getElementById("nem");
	if (nem) {

		if (nem.value === false)
		{
			rendben = false;

		}
	}



	return rendben;
}
