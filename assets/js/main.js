function convert(number) {
    var digits = number.length;
    if (number === "") {
        return "";
    }
    var numberString = number;
    number = +number;

    if (number < 1 || number > 9999) {
        return "Пожалуйста, используйте диапазон от 1 до 9999";
    }
    var small = ["ноль","один","два","три","четыре","пять","шесть",
    "семь","восемь","девять","десять","одиннадцать",
    "двенадцать","тринадцать","четырнадцать","пятнадцать",
    "шестнадцать","семнадцать","восемнадцать","девятнадцать"];

    var tens = [null,null,"двадцать","тридцать","сорок","пятьдесят","шестьдесят","семьдесят","восемьдесят","девяносто"];
    var hundreds = [null,"сто","двести","триста","четыреста","пятьсот","шестьсот","семьсот","восемьсот","девятьсот"];
    var thouthands = [null,"одна тысяча","две тысячи","три тысячи","четыре тысячи","пять тысяч","шесть тысяч","семь тысяч","восемь тысяч","девять тысяч"];

    var result = "";
    switch (digits) {
        case 4: result += thouthands[+numberString[0]] + " " + convert(numberString.substr(1));
            break;
        case 3: result += hundreds[+numberString[0]] + " " + convert(numberString.substr(1));
            break;
        default:
        if (number > 0 && number < 20) {
            result = small[number];
        } else {
            result = tens[+numberString[0]] + " " +small[+numberString[1]]
        }

    }

    return result;
}

var app = new Vue({
    el: '#number-app',
    data: {
        number: null,
        converted: null,
        englishMode: false
    },
    methods: {
        recalculate: function () {
        this.converted = convert(this.number);
      }
    }
  })