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
		slug = slug.replace(/ /g,"-").toLowerCase();
		$('#slugcategoria').val(slug);
	});
	$('#forminsertarproducto').validate({
		rules : {
			categoria : 'required',
			nombre : 'required',
			slug : 'required',
			precio : 'required',
			foto : {
				required : true,
				extension: "jpg"
			}
		}
	});
	$('#formeditarproducto').validate({
		rules : {
			categoria : 'required',
			nombre : 'required',
			slug : 'required',
			precio : 'required',
			foto : {
				extension: "jpg"
			}
		}
	});
	
	
})