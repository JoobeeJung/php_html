<div class="row">
    <div class="col-6 colLine">
        <div class="row">
            <img id="mainImg"src="data/img/slide1.jpg" class="img-fluid">
        </div>
        <div class="row">
            <div class="col-1">
                <img src="data/img/slide1.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide2.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide3.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide1.jpg" class="img-fluid"  onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide2.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide3.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide1.jpg" class="img-fluid"  onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide2.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide3.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide1.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide2.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
            <div class="col-1">
                <img src="data/img/slide3.jpg" class="img-fluid" onMouseOver=showImg(this) onMouseOut=outImg(this)>
            </div>
        </div>
    </div>
    <div class="col-6 colLine">
        <div class="row">
            <div class="col-2">제조사</div>
            <div class="col-10">마켓컬리</div>
        </div>
        <div class="row bg-light">
            <div class="col-2">전화번호</div>
            <div class="col-10">02-2073-1111</div>
        </div>
        <div class="row">
            <div class="col-2">가격</div>
            <div class="col-10">
                <input id="price" value="1000" disabled class="form-control">
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-2">수량선택</div>
            <div class="col-10">
                <input id="count" type="tel" onKeyUp=sumResult() class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-2">합계</div>
            <div class="col-10">
                <input id="result" type="tel" disabled class="form-control">
            </div>
        </div>
    </div>
</div>

    <div class="row">
        <div class="row">
            주문자정보
        </div>
        <div class="row">
            <div class="col-2">이름</div>
            <div class="col-10">
                <input id="userName" type="text" class="form-control" value="홍길동">
            </div>
        </div>
        <div class="row">
            <div class="col-2">주소</div>
            <div class="col-10">
                <input id="address" type="text" class="form-control" value="서울시 강남구 선릉캠퍼스">
            </div>
        </div>
        <div class="row">
            <div class="col-2">연락처</div>
            <div class="col-10">
                <input id="phone" type="tel" class="form-control" value="010-1234-5678">
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <input type="checkbox" id="chkbox" onClick=fillShippingInfo(this)>
            </div>
            주문자와 동일함
        </div>
        <div class="row">
            <div class="col-2">받으시는 분</div>
            <div class="col-10">
                <input id="shippingName" class="form-control"  type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-2">배송 주소</div>
            <div class="col-10">
                <input id="shippingAddress"class="form-control"  type="text">
            </div>
        </div>
        <div class="row">
            <div class="col-2">받으시는 분 연락처</div>
            <div class="col-10">
                <input id="shippingPhone" class="form-control" type="tel" value="">
    <!-- <div class="col-2 colLine">
        <div class="row">
            <div class="col">
                <img src="data/img/bag1.jpg" class="img-fluid rounded">
            </div>
        </div>
        <div class="row">
            <div class="col"><img src="data/img/bag1.jpg" class="img-fluid rounded"></div>
            <div class="col"><img src="data/img/bag2.jpg" class="img-fluid rounded"></div>
            <div class="col"><img src="data/img/bag3.jpg" class="img-fluid rounded"></div>
            <div class="col"><img src="data/img/bag4.jpg" class="img-fluid rounded"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col colLine">
        <div class="row">
            <div class="col-2 colLine">제품명</div>
            <div class="col colLine fw-bold">국민가방</div>
        </div>
        <div class="row">
            <div class="col-2 colLine">제조사</div>
            <div class="col colLine">KB 국민은행</div>
        </div>
        <div class="row">
            <div class="col-2 colLine">가격</div>
            <div class="col colLine">
                <input type="text" id="price" class="form-control" value="1000" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-2 colLine">수량</div>
            <div class="col colLine">
                <input type="number" id="count" value="1" max="10" min="1" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-2 colLine">합계</div>
            <div class="col colLine">
                <input type="text" id="total" value="1000" class="form-control" readonly>
            </div>
        </div>
    </div> -->

</div>

<script>
    var mainImg = document.querySelector("#mainImg");

    function showImg(obj)
    {
        
        mainImg.src = obj.src;

    }
    function outImg(obj)
    {
        
        mainImg.src = "";

    }
    function sumResult()
    {
        var price = document.querySelector("#price").value;
        var count = document.querySelector("#count").value;
        var sumResult = document.querySelector("#result");

        var result = price * count;
        sumResult.value = result.toLocaleString('ko-KR');

    }
    function fillShippingInfo(obj)
    {

        var name = document.querySelector("#userName").value;
        var address = document.querySelector("#address").value;
        var phone = document.querySelector("#phone").value;

        var shippingName = document.querySelector("#shippingName");
        var shippingAddress = document.querySelector("#shippingAddress");
        var shippingPhone = document.querySelector("#shippingPhone");

        if (obj.checked == true)
        {
            shippingName.value = name;
            shippingAddress.value = address;
            shippingPhone.value = phone;

        }
    }
</script>
</div>
