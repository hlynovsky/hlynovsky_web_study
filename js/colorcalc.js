// Функция для выполнения операций и расчета цвета
function calculateColor(num1, num2, operation, r, color_r) {
    let c1 = +document.getElementById(num1).value;
    let c2 = +document.getElementById(num2).value;
    let op = document.getElementById(operation).value;

    let res = +document.getElementById(r);
    let result;

    switch (op) {
        case '+':
            result = c1 + c2;
            break;
        case '-':
            result = c1 - c2;
            break;
        case '*':
            result = c1 * c2;
            break;
        case '/':
            result = c1 / c2;
            break;
        default:
            document.getElementById(r).innerHTML = "ошибка: неизвестная операция";
            return false;
    }
    document.getElementById(r).innerHTML = result;
    let colorString = "#" + result.toString(16).padStart(6, '0');
    document.getElementById(color_r).style.backgroundColor = colorString;
    return false;
}

// Функция для преобразования числа в цвет
function convertToColor(num, color_num) {
    let c1 = +document.getElementById(num).value;
    let colorString = "#" + c1.toString(16).padStart(6, '0');
    document.getElementById(color_num).style.backgroundColor = colorString;
    return true;
}

// Функция для генерации случайных чисел и операций
function generateRandomValues() {
    // Генерация случайных чисел от 1 до 1000
    let num1 = Math.floor(Math.random() * 1000) + 1;
    let num2 = Math.floor(Math.random() * 1000) + 1;

    // Генерация случайной операции
    let operations = ['+', '-', '*', '/'];
    let op = operations[Math.floor(Math.random() * operations.length)];

    // Заполнение полей формы
    document.getElementById('n1').value = num1;
    document.getElementById('n2').value = num2;
    document.getElementById('op').value = op;

    // Обновление цветов
    convertToColor('n1', 'color_n1');
    convertToColor('n2', 'color_n2');
}
