<div class="row">
    <div class="col">
        <input type="text" id="msg" class="form-control" autofocus="true">
    </div>
    <div class="col">
        <button type="button" id="addBtn" class="btn btn-primary">추가</button>
    </div>
</div>
<div class="row">
    <div class="col" id="msgList">
        <!--
            <ul>
                <li>이순신</li>
                <li>홍길동</li>
            </ul>
        -->
    </div>
</div>

<script>
    var msgArray = [];
    var addBtn = document.querySelector("#addBtn");

    addBtn.addEventListener("click", addMessage);

    function addMessage()
    {
        var msg = document.querySelector("#msg");

        if(msg.value == "")
        {
            alert("입력해주세요.");
            return false;
        }else
        {
            let msgList = document.querySelector("#msgList");
            msgArray.push( msg.value );
            showMessage();

            let html = "";
            html += "<ul>";

            for(let i = 0; i < msgArray.length ; i++)
            {
                html += "<li>" + msgArray[i] + "</li>";
            }

            html += "</ul>";
            msgList.innerHTML = html;


        }
        msg.value = "";
    }

    function showMessage()
    {
        var showMsg = "<ul>"
        for(let i = 0; i<msgArray.length; i++)
        {
            showMsg += "<li>" + msgArray[i] +"</li>"
        }
        showMsg += "</ul>"

        let msgList = document.querySelector("#msgList");
        msgList.innerHTML = showMsg;
    }


</script>
