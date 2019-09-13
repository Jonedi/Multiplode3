/*
El algoritmo hace que en una secuencia de números del 1 hasta el 100,
tome los números divisibles por 3 y cambie el número por "Fizz". Tome los números divisibles por 5
y el número lo cambie por "Buzz". A los números divisibles por 3 y 5, lo cambie por "FizzBuzz"
*/
var num = 100; // se declara la variable para definir el ciclo hasta donde termina
content = document.querySelector('#contenido')

for(var i = 1; i <= 100; i++) // Se crea el ciclo para crear la iteración
{
    if(modulo(i, 3)) // se usa la función y se toma "i" como número (num) y 3 como "divisor"
    {
        content.innerHTML += `Fizz`;
    }
    if(modulo(i, 5)) // se usa la función y se toma "i" como número (num) y 5 como "divisor"
    {
        content.innerHTML += `Buzz`;
    }
    // // el signó "!" le dice al script una negación. 
    if (!modulo(i, 3) && !modulo(i, 5)) // En este caso, dice que la expresión no es divisible
    {
        content.innerHTML += `${i}`;
    }
    content.innerHTML += `<br />`
}

// Función para crear la operación de módulo y usarla en el script "num" es el número a operar y "divisor" es el numero operador
function modulo(num, divisor) 
{
    if (num % divisor == 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

/* el resultado de este algoritmo, es que los números divisibles por 3 y 5, les coloca la palabra "FizzBuzz"*/