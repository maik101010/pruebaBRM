(function(){

	formulario = document.getElementById("form");

	var validarInputs = function(e){
		var valores =formulario.getElementsByTagName("input");
		for (var i=0; i<valores.length; i++)
			
			if (valores[i].value == 0){
				 alert("Falta llenar el campo "+ valores[i].name);
				 e.preventDefault()

			}/**
			 * Empieza la validación de los campos númericos
			 * @param  valores[i].name [los valores recorridos del array del formulario]
			 */
			else if (valores[i].name=="lote" || valores[i].name=="precio" || valores[i].name=="cantidad") {
				var campo=valores[i].value
				if (!/^([0-9])*$/.test(campo)){				
					alert("El valor " + campo + " no es númerico")
					e.preventDefault()
				}
			}
			/**
			 * Empieza la validación de los campos de texto
			 * @param  valores[i].name [los valores recorridos del array del formulario]
			 */
			else if (valores[i].name=="nombre") {
				var filtro = /[a-zA-Z]/
				var campo = valores[i].value
				if (!filtro.test(campo)){
					alert("El valor " + campo + " no es texto ")
					e.preventDefault()
				}
			}

		};

	var validarSelects = function(e){
		var valores = formulario.getElementsByTagName("select");
		for (var i=0; i<valores.length; i++)
		if (valores[i].value == 0){
			 alert("Falta Seleccionar");
			 e.preventDefault()

		}

	}

		var validar = function(e){
			validarInputs(e);
			validarSelects(e);			
		};


	formulario.addEventListener("submit", validar);

}())