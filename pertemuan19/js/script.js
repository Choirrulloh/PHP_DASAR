// ambil elen yang dibutuhkan
var keyword = document.getElementById('keyword');
var tombolcari = document.getElementById('tombolcari');
var tableMhs = document.getElementById('tableMhs');

// tambah event ketika keyword ditulis
keyword.addEventListener('keyup', function(){
	var xhr = new XMLHttpRequest();

	// mengecek kesiapan ajax
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			tableMhs.innerHTML = xhr.responseText;
		}
	}

	// eksekusi ajax
	xhr.open('GET', 'ajax/mahasiswa.php?keyword='+ keyword.value,true)
	xhr.send();
});
