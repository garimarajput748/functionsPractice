function addTwoNumbers(num1,num2)
{
    return parseInt(num1)+parseInt(num2);
}

//to check num is divisible by 7 or not
function isDivisibleBy7(num) {
// if(num == 0 || num == 7) return 1;
// else if(num < 0) return num;
if(num % 7 == 0) return ('divisible');
else return('not divisible');
}

// print the counting number using while loop
function countNumber(endNum){
    let startNum = 1;
        while(endNum >= startNum){
            document.write(startNum +'<br>');
            startNum++;
        }
}

// create function that return length of the string 
function strLength(str){
    return str.length;
}

// create a function that return sum of digit 
function sumOfDigits(digits) {
    let sum = 0;
    for (let i = 0; i < strLength(digits); i++) {
        sum = sum + parseInt(digits[i]);
    }
    return sum;
}

// create a function that will square than add all digit value
function sumAndSquareOfDigits(digits) {
    let sum = 0;
    for (let i = 0; i < strLength(digits); i++) {
        sum = sum + parseInt(digits[i]*digits[i]);
    }
    return sum;
}

// create a function that will return reverse of the string 
function reverseStr(Str){
    let string = '';
    for(let i = strLength(Str)-1; i >= 0; i--){
        string += Str[i];
    }
    return string;
}

// check a function that check number is palindrome or not
function palindrome(num){
    if(num == reverseStr(num)){
        return ('palindrome');
    }
    else return('not palindrome');
}

//create a function that will return x to the power n
function checkPower(x,n){
    let result = x;
    for(let i = 1; i < n; i++){
        result = result * x;
    }
    return result;
}

//create a function that check number is prime or not ?
function checkPrime(num){
    if(num == 1) return ('1 is not prime number');
    else if(num > 1){
        for(let i = 2; i < num; i++){

            if(num % i == 0) return (num+' is Not Prime Number');
            
            else return(num+' is Prime Number');
        }
    }
    else return ('It is not Prime Number');
}

//create a function that check entered year is leap or not 
function checkLeap(leapYear){
if(leapYear % 4 == 0) return (leapYear+' is leap year');
else return (leapYear+' is not leap year');
}

// create a function that swap two values
function swapTwoNum(num1 , num2){
    let temp;
    temp = num1;
    num1 = num2;
    num2 = temp;
    return (num1 +' , '+ num2);
}