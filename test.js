var r= $.ajax({
	url: 'Text.php',
	method:'GET',
	dataType:'json',
	data:{request : 'titre',titre : 'lotfi'},
	success: function(response){

	},
	error : function(){

	},
});