function addrow(event) {
  if (event.key === "Enter") {
    console.log("enter")

    var tabla = document.querySelector(".canttam");
    var filas = tabla.querySelectorAll(".item");
    var ultimaFila = filas[filas.length - 1];

    var inputs = ultimaFila.querySelectorAll("input.item_row");
    var todosLlenos = true;

    // Verificar si todos los inputs de la última fila están llenos
    for (var i = 0; i < inputs.length; i++) {
      if (inputs[i].value.trim() === "") {
        todosLlenos = false;
        break;
      }
    }

    if (todosLlenos) {
      var nuevaFila = ultimaFila.cloneNode(true); // Clonar la última fila

      // Borrar los valores de los inputs de la nueva fila
      var nuevosInputs = nuevaFila.querySelectorAll("input.item_row");
      for (var j = 0; j < nuevosInputs.length; j++) {
        nuevosInputs[j].value = "";
      }

      // Actualizar el número en el primer td con el número de fila correspondiente
      var numFila = filas.length + 1;
      nuevaFila.querySelector("td").textContent = numFila;

      tabla.appendChild(nuevaFila); // Agregar la nueva fila al final de la tabla
    }
        

  }
}