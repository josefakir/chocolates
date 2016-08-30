$(document).ready(function(){
	$('.parallax-window').parallax({imageSrc: 'images/slide.jpg'});
	$('#triggermenu').click(function(e){
		e.preventDefault();
		$('#menucategorias').toggle();
	});
})