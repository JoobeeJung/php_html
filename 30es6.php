<script>
    function add(a,b)
    {
        return a + b;
    }

    let result = add(10,20);
    console.log("result = "+result);

    /** 익명함수 : 이름이 없는 함수
        함수 자체가 식 (expression) 값을 즉시 할당할때 사용한다. 단발성
        function pointer -> add2 가 함수 이름*/

    let add2 =  function(a, b){ /** add2는 함수이름 */
        return a+b
    }
    let result2 = add2(1,2);
    console.log("result2 = "+result2);

    /**
        즉시 실행함수 : 함수를 정의함과 동시에 실행
        표기법 1 : 
            (function(){ 

            }) (); 뒤의 괄호는 함수 실행해 라는 의미
        표기법 2 : 
            (function(){

            }() ); 
        약식 표기법1:
            (function(){})();
        약식 표기법2:
            (function(){}());
     */
    let result3 = (function(){return 100+200}());
    console.log("result3 = "+result3);

    let result4 = (function(a,b){
        return a + b;
    }(11,22))
    console.log("result4 = "+result4);

    /**
        화살표 함수 : => 
        1. 매개 변수가 없는 경우,
        2. 파라미터가 1개인경우
        3. 파라미터가 2개 이상인경우
     */

     const hiFunc = function(){return "Hello JS World";}
     console.log("hi = "+hiFunc);
     console.log("hi = "+hiFunc());
     let hi = hiFunc()
     console.log("Hi = " + hi);

     let hiFunc2 = () => {return "Hello JS ES6 world"}
     let hi2 = hiFunc2();
     console.log("hiFunc2 = " + hi2);

     // 파라미터가 1개인 경우
     let hiFunc3 = function(user){
         console.log("Hi~~~" + user);
         return "OK";
     }
     let hi3 = hiFunc3("Kim");
     console.log("hiFunc3 = " + hi3);

     let hiFunc4 = user => { //hiFunc3(user) => {} 도 가능
         console.log("hi4 = "+user);
         return "Ok Arrow";
     };

     let hi = hiFunc4("Park");
     console.log("hiFunc4s = " + hi4);

    //  let getSumFunc = function(a,b){return a+b};

    let getSumFunc= (a,b)=> {return a + b;}
    let resultSum = getSumFunc(111,222)
    console.log("result Sum = " + resultSum )

    //함수소그이 코드가 1줄은 다음과 같이 표현할 수 있다.
    let getSumFunc2= (a,b)=> a+b;
    let resultSum2 = getSumFunc2(111,222)
    console.log("result Sum2 = " + resultSum2 )
</script>