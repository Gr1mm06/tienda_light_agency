<script>

	cargarProdcutos = (id_subcategoria) => {
		$('#cuerpo').load("<?= base_url(); ?>/producto/mostrarProductosBySubcategoria/" + id_subcategoria );
	}

	detalleProducto = (id_producto) => {
		$('#cuerpo').load("<?= base_url(); ?>/producto/detalleProducto/" + id_producto );
	}

	buscar = () => {
		let texto = $('#busqueda').val();
		let busqueda = texto.replace(" ", "_");
		$('#cuerpo').load("<?= base_url(); ?>/producto/buscar/" + busqueda );
	}

	function guardarRegistros(numero) {
		    let token = '{{csrf_token()}}';
		    let post_data = {'cantidad' : numero, '_token' : token};
		    $.ajax({
	            data: post_data,
	            type: 'post',
	            url: "<?= base_url(); ?>/producto/generarInformacionBasica",
	            dataType: 'json',
	            success: function(response) {
	              	console.log(response);
	         		if (response == false){
	         			alert('Hubo un problema al insertar');
	         		}else{
	         			alert('Agregado correctamente');
	         		}
	            }
	        });
	}

	deferir = () => {
		let forma = $('#forma').val();
		let precio = $('#precio').val();

		let mensualidad = parseFloat(precio) / parseFloat(forma) ;
		
		$("#pagos").text(mensualidad.toFixed(2));
	}
	
</script>