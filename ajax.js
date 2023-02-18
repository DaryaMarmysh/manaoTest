
$('#submit_btn_reg').click(function (e) {
	e.preventDefault();
	$(`span`).addClass('hidden');

	let login = $('input[name="login"]').val(),
		password = $('input[name="password"]').val(),
		password_re = $('input[name="password_re"]').val(),
		email = $('input[name="email"]').val(),
		username = $('input[name="username"]').val();

	let formData = new FormData();
	formData.append('login', login);
	formData.append('password', password);
	formData.append('password_re', password_re);
	formData.append('username', username);
	formData.append('email', email);

	$.ajax({
		url: 'signup.php',
		type: 'POST',
		dataType: 'json',
		processData: false,
		contentType: false,
		cache: false,
		data: formData,
		success(data) {
			console.log(data.message);
			if (data.status) {
				document.location.href = 'login.php';
			} else {
				for (fieldName in data.fields) {
					$(`span[name="${fieldName}"]`).removeClass('hidden');
					$(`span[name="${fieldName}"]`).html(data.fields[fieldName]);
				}
			}

		}
	});

});
$('#submit_btn_log').click(function (e) {
	e.preventDefault();
	$(`span`).addClass('hidden');

	let login = $('input[name="login"]').val(),
		password = $('input[name="password"]').val();
		

	let formData = new FormData();
	formData.append('login', login);
	formData.append('password', password);

	$.ajax({
		url: 'signin.php',
		type: 'POST',
		dataType: 'json',
		processData: false,
		contentType: false,
		cache: false,
		data: formData,
		success(data) {
			console.log(data.message);
			if (data.status) {
				document.location.href = 'main_page.php';
			} else {
				for (fieldName in data.fields) {
					$(`span[name="${fieldName}"]`).removeClass('hidden');
					$(`span[name="${fieldName}"]`).html(data.fields[fieldName]);
				}
			}

		}
	});

});

$('#exit_btn').click(function (e) {

	e.preventDefault();
	let formData = new FormData();
	formData.append('exit', 'true');
	$.ajax({
		url: 'logout.php',
		type: 'POST',
		dataType: 'json',
		processData: false,
		contentType: false,
		cache: false,
		data: formData,
		success(data) {
			if (data.status) {	
				document.location.href = 'login.php';
				
			} else {
				console.log(data.message);
			}

		}
	});

});
