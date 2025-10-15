function operar(operador) {
  const num1 = parseFloat(document.getElementById("num1").value);
  const num2 = parseFloat(document.getElementById("num2").value);
  let resultado;

  if (isNaN(num1) || isNaN(num2)) {
    resultado = "Por favor ingresa ambos números.";
  } else {
    switch (operador) {
      case '+': resultado = num1 + num2; break;
      case '-': resultado = num1 - num2; break;
      case '*': resultado = num1 * num2; break;
      case '/':
        resultado = num2 !== 0 ? num1 / num2 : "No se puede dividir por cero";
        break;
    }
  }

  document.getElementById("resultado").textContent = "Resultado: " + resultado;
}