$(document).ready(function(){
	$('#keyword').on('keyup', function(){
		$('#tableMhs').load('ajax/mahasiswa.php?keyword='+ $('#keyword').val());
	});
});
