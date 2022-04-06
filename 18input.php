

<div class="container-fluid kbstarbg">
    <div class="row p-0 m-0">
        <div class="col text-center p-0 m-0">
            menu1, menu2, menu3, menu4
        </div>
    </div>
</div>    

http://nadopro.dothome.co.kr/input.html

<div class="container-fluid kbstarbg">
	<div class="row">
        <div class="col">
            <img src="./data/img/kbstar.png" class="img-fluid">
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<div class="container">
		<a class="navbar-brand" href="#">
			<span class="material-icons icon">home</span>
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuBar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menuBar">
			<ul class="navbar-nav">
				<li class="nav-item dropdown ms-4">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">HTML</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="./01.html">01.html</a></li>
						<li><a class="dropdown-item" href="./02Form.html">02Form.html</a></li>
						<li><a class="dropdown-item" href="#">A third link</a></li>
					</ul>
				</li>

				<li class="nav-item dropdown ms-4">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">JavaScript</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Link4</a></li>
						<li><a class="dropdown-item" href="#">Another link</a></li>
						<li><a class="dropdown-item" href="#">A third link</a></li>
					</ul>
				</li>


			</ul>
		</div>
	</div>
</nav>

	<div class="container"> <!--Container : 양쪽에 여백을 적당하게 남겨둔다-->
		<div class="row">
			<div class="col">
				<h4 class="text-primary">
					<span class="material-icons icon">double_arrow</span>input</h4> 
			</div>
		</div>
		<form method="post" action="#">
		<div class="row">
			<div class="col-2 colLine">
				TEXT
			</div>
			<div class="col colLine">
				<input type="text" name="id" class="form-control">
			</div>
		</div>

		<div class="row">
			<div class="col colLine">
				<input type="text" name="name" class="form-control" required placeholder="회색글씨" value="홍길동" readonly>
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				PW
			</div>
			<div class="col colLine">
				<input type="password" name="pw" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-2 colLine">
				AGE
			</div>
			<div class="col colLine">
				<input type="number" name="pw" class="form-control" value="10">
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				email
			</div>
			<div class="col colLine">
				<input type="email" name="email" class="form-control">
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				url
			</div>
			<div class="col colLine">
				<input type="url" name="url" class="form-control">
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				color
			</div>
			<div class="col colLine">
				<input type="color" name="color" value="#ABCDEF" class="form-control">
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				DATE
			</div>
			<div class="col colLine">
				<input type="date" name="birth" value="2022-04-11" class="form-control">
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				SELECT
			</div>
			<div class="col colLine">
				<select name="nation" class="form-control form-control-lg">
					<option value="0">== 선택하세요 ==</option>
					<option value="1">대한민국</option>
					<option value="2">USA</option>
					<option value="3">中國</option>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				Switch
			</div>
			<div class="col colLine">
				<div class="form-check form-switch">
					<input type="checkbox" class="form-check-input" id="myOnOff" name="onoff" checked> 
					<label for="myOnOff">On/Off를 선택하세요</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				Checkbox
			</div>
			<div class="col colLine">
				<input type="checkbox" class="form-check-input" name="sleep" checked> 잠자기 
				<input type="checkbox" class="form-check-input" name="running" > 달리기 
				<input type="checkbox" class="mycheckbox" name="swimming" disabled> 수영  
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				Radio
			</div>
			<div class="col colLine">
				<input type="radio" class="form-check-input" name="gender" checked> 남성 
				<input type="radio" class="form-check-input" name="gender" > 여성 
				<input type="radio" class="form-check-input" name="gender" checked> 기타 
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				Textarea
			</div>
			<div class="col colLine">
				<textarea name="memo" class="form-control" rows="10">원본글씨</textarea> 
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				Range
			</div>
			<div class="col colLine">
				<input type="range" name="range" class="form-range">
			</div>
		</div>
		<div class="row">
			<div class="col-2 colLine">
				Range2
			</div>
			<div class="col colLine">
				<input type="range" name="range2" value="30" class="form-range">
			</div>
		</div>
		<div class="row">
			<div class="col-2 colLine">
				Range3
			</div>
			<div class="col colLine">
				<input type="range" name="range2" value="30" min="10" max="50" step="5" class="form-range">
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				inputGrp
			</div>
			<div class="col  colLine">
				<div class="input-group">
					<span class="input-group-text material-icons">fingerprint</span>
					<input type="text" class="form-control">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				inputGrp
			</div>
			<div class="col colLine">
				<div class="input-group">
					<span class="input-group-text material-icons">search</span>
					<input type="text" class="form-control" placeholder="검색어">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				inputGrp
			</div>
			<div class="col colLine">
				<div class="input-group">
					<span class="input-group-text">검색어</span>
					<input type="text" class="form-control" placeholder="검색어">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2 colLine">
				inputGrp
			</div>
			<div class="col colLine">
				<div class="input-group">
					<span class="input-group-text">하나</span>
					<input type="text" class="form-control" placeholder="검색어">
				</div>
			</div>
		</div>



		</form>

		사용자입력 form <br>
		2가지 : 키보드입력, 선택 <br>
		키보드 입력 : text, <br>
		마우스 선택 : select, check, radio, color, date<br>
			select : 여러개 중에 하나(많은 선택중 하나) <br>
			radio : 성별: 남, 여, G <br>
			checkbox : 취미, 여러개 중복 선택




	</div> <!--Container-->
