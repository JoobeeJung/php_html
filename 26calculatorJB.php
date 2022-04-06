<script>

    // 연산자를 기록할 메모리
    var operator = "";
    // 앞쪽 피연산자 저장할 메모리
    var op1 = "";
    // 깃발
    var flag = 0;

    function doNum(no)
    {
        var display = document.querySelector("#display");

        if(display.value == 0)
        {
            display.value = no;
        }else
        {
            display.value += no;
        }
    }
    var num1;
    var num2;
    var operator;
    var result;

    function doCalculate(calc)
    {
        var display = document.querySelector("#display");

        if(calc == "+")
        {
            num1 = display.value;
            display.value = 0;
            operator = "+";

        }else if (calc == "-")
        {
            num1 = display.value;
            display.value = 0;
            operator = "-";

        }else if (calc == "*")
        {
            num1 = display.value;
            display.value = 0;
            operator = "*";
        }else if (calc == "/")
        {
            num1 = display.value;
            display.value = 0;
            operator = "/";
        }else if (calc == "=")
        {
            num2 = display.value;
            num1 = Number(num1);
            num2 = Number(num2);

            if(operator == "+")
            {
                result = num1 + num2;
            }else if(operator == "-")
            {
                result = num1 - num2;
            }else if(operator == "*")
            {
                result = num1 * num2;
            }else if(operator == "/")
            {
                result = num1/num2;
            }
            display.value = result;
        }

    }
   
    function doCE()
    {
        var display = document.querySelector("#display");
        display.value = 0;
        /*
            if(display == 0)
                display= 숫자
            else
                display = 현재 값 + 숫자
        */
        var display = document.querySelector("#display");

        if(operator == "") 
        {
            
            if(display.value == "0")
            {
                    display.value = no;
            }else
            {
                    display.value = display.value + no;
            }
        }else
        {
            if(flag == 0)
            {
                op1 = display.value;
                display.value = no;
                flag = 1;
            }else
            {
                display.value = display.value + no;
            }
            console.log("op1 = " + op1 + ", operator = " + operator + ", flag = "+ flag);
 
        }
    }

    function doPlus()
    {
        // 연산자 = +
        operator = "+";

    }
</script>

<div class="row">
    <div class="col-8">
        <input type="text" class="form-control text-end fw-bold" id="display" value="0" readonly>   
    </div>
    <div class="col">    
    </div>
</div>
<div class="row">
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn1" onClick="doNum(1)">1</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn2" onClick="doNum(2)">2</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn3" onClick="doNum(3)"> 3</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btnPlus" onClick="doCalculate('+')">+</button>    
    </div>
    <div class="col">    
    </div>
</div>
<div class="row">
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn4" onClick="doNum(4)">4</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn5" onClick="doNum(5)">5</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn6" onClick="doNum(6)">6</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btnMinus" onClick="doCalculate('-')">-</button>    
    </div>
    <div class="col">    
    </div>
</div>
<div class="row">
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn7" onClick="doNum(7)">7</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn8" onClick="doNum(8)">8</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn9" onClick="doNum(9)">9</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btnProduct" onClick="doCalculate('*')">*</button>    
    </div>
    <div class="col">    
    </div>
</div>

<div class="row">
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btn0" onClick="doNum(0)">0</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btnDivide" onClick="doCalculate('/')"> /</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btnCE" onClick="doCE()">CE</button>    
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-primary form-control" id="btnEqual" onClick="doCalculate('=')">=</button>    
    </div>
    <div class="col">    
    </div>
</div>
