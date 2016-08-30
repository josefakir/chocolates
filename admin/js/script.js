$(document).ready(function(){
	/* ADMINISTRADORES */
	$('#forminsertaradmin').validate({
		rules : {
			correo : {
				required : true,
				email :true
			},
			contrasena : 'required',
			repetircontrasena : {
				required : true,
				equalTo : '#contrasena'
			}
		}
	});
	/* CATEGORIAS */
	$('#forminsertarcategoria').validate({
		rules : {
			nombre : 'required',
			slug : 'required'
		}
	});
	$('#nombrecategoria').blur(function(){
		var slug = $(this).val();
		slug = slug.replace(" ","-").toLowerCase();
		$('#slugcategoria').val(slug);
	})
	
})