// Функция для генерации случайного числа в диапазоне
let generateNumber = (max, min) => Math.floor(Math.random() * (max - min)) + min;

// Функция для нахождения суммы двух чисел
let sumTwoNumbers = (n1, n2) => n1 + n2;

// Функция для установки значения в элемент с указанным id
let setElement = (id, val) => {
    document.getElementById(id).innerHTML = val;
};

// Функция для проверки простоты числа
let isPrime = (num) => {
    let flag = true;
    for (let i = 2; i < num; i++) {
        if (num % i === 0) {
            flag = false;
            break;
        }
    }
    return flag;
};

// Функция для нахождения всех делителей числа
let findDivisors = (num) => {
    let divisors = [];
    for (let i = 1; i <= num; i++) {
        if (num % i === 0) divisors.push(i);
    }
    return divisors;
};

// Функция для генерации случайного числа и вывода его делителей
let generateNumberAndDivisors = () => {
    let num = generateNumber(10000, 1); // Случайное число от 1 до 10000
    setElement("random_num", num); // Вывод случайного числа
    setElement("divisors", findDivisors(num).join(", ")); // Вывод делителей через запятую
};

window.onload = () => {
    // Генерация и вывод суммы двух чисел
    let num1 = generateNumber(1000, 1);
    let num2 = generateNumber(1000, 1);
    setElement("num1", num1);
    setElement("num2", num2);
    setElement("sum_result", sumTwoNumbers(num1, num2));

    // Проверка числа на простоту
    let num = generateNumber(1000, 1);
    setElement("num", num);
    if (isPrime(num)) {
        setElement("prime_result", "простое");
    } else {
        setElement("prime_result", "имеет делители");
    }

    // Генерация случайного числа и вывод его делителей
    generateNumberAndDivisors();
};

