<?php 
	include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>📍지도 생성하기</title>
    
</head>
<body>
<!-- 지도를 표시할 div 입니다 -->
<input type="button" value="+" onClick=zoomIn()> 
<input type="button" value="-" onClick=zoomOut()> 

<div id="map" style="width:100%;height:500px;"></div>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=<?php echo $kakaoKey ?>"></script>
<script>
var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = { 
        center: new kakao.maps.LatLng(37.5041662879426, 127.052043567109), // 지도의 중심좌표
        level: 2 // 지도의 확대 레벨
    };

	// 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
	var map = new kakao.maps.Map(mapContainer, mapOption); 



	function zoomIn()
	{
		let level = map.getLevel();
		//alert(level);
		if(level > 1)
			map.setLevel(level -1);
	}

	function zoomOut()
	{
		let level = map.getLevel();
		//alert(level);
		if(level < 19)
			map.setLevel(level +1);
	}


</script>
</body>
</html>