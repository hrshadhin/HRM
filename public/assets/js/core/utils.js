var Utils = {
    takaFormat:function(num){
    num = String(num);
    num = num.replace(/,/g, '');

    function makeComma(input){
        // This function is written by some anonymous person - I got it from Google
        if(input.length<=2)
        {
            return input;
        }
        var length = input.substr(0, input.length - 2);
        return makeComma(length)+ "," + input.slice(-2);
    }


    // This is my function
    // $pos = strpos((string)$num, ".");
    var pos = num.indexOf(".");
    var decimalpart = false;
    if(pos > -1){
        decimalpart = num.substr(pos+1, 2);
        num = num.substr(0, pos);
    }

    if(decimalpart.length < 1){ decimalpart = "00"};

    if( parseInt(decimalpart)  < 1 ){
        decimalpart = "00";
    }

    var last3digits,numexceptlastdigits,formatted,stringtoreturn;
    if( num.length > 3  ){
        last3digits =  num.slice(-3);
        numexceptlastdigits =  num.slice(0,num.length - 3);
        formatted = makeComma(numexceptlastdigits);
        stringtoreturn = formatted + "," + last3digits + (decimalpart? "." + decimalpart :"") ;
    }
    else if(num.length <=3){
        stringtoreturn = num + ( decimalpart ? "."+decimalpart : "" ) ;
    }
    // else if(num.length > 12){
    //     stringtoreturn = String(Number(num).toFixed(2));
    // }

    if( stringtoreturn.substr(0, 2) == "-,"){
        stringtoreturn = "-" + stringtoreturn.substr(2);
    }
    return stringtoreturn;
}
};