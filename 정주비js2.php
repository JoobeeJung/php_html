<?php 
	include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>📍여의도 국민은행 지점</title>
    
</head>
<body>
<!-- 지도를 표시할 div 입니다 -->
<input type="button" value="➕" onclick="zoomIn()">
<input type="button" value="➖" onclick="zoomOut()">

<div id="map" style="width:100%;height:700px;"></div>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=<?php echo $kakaoKey ?>"></script>
<script>
var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = { 
        center: new kakao.maps.LatLng(37.5208677482908, 126.927894008166), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

// 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
var map = new kakao.maps.Map(mapContainer, mapOption); 
var infoWindowOpened = false;

// 마커를 표시할 위치와 title 객체 배열입니다 
var positions = [
    {
        title: 'KB국민은행 여의도본점', 
        tel: '02-2073-7114',
        latlng: new kakao.maps.LatLng(37.5208677482908, 126.927894008166)
    },
    {
        title: 'KB국민은행 여의도종합금융센터', 
        tel: '02-785-2691',
        latlng: new kakao.maps.LatLng(37.5218052926703, 126.925651244211)
    },
    {
        title: 'KB국민은행 동여의도지점', 
        tel: '02-786-6191',
        latlng: new kakao.maps.LatLng(37.5211195361581, 126.930836281461)
    },
];

var imageSrc = 'data/img/kb.png', // 마커이미지의 주소입니다    
    imageSize = new kakao.maps.Size(60, 60), // 마커이미지의 크기입니다
    imageOption = {offset: new kakao.maps.Point(30, 30)}; // 마커이미지의 옵션입니다. 마커의 좌표와 일치시킬 이미지 안에서의 좌표를 설정합니다.

for (var i = 0; i < positions.length; i ++) {
    
    // 마커 이미지의 이미지 크기 입니다
    var imageSize = new kakao.maps.Size(60, 60); 
    
    // 마커 이미지를 생성합니다    
    var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize); 
    
    // 마커를 생성합니다
    var marker = new kakao.maps.Marker({
        map: map, // 마커를 표시할 지도
        position: positions[i].latlng, // 마커를 표시할 위치
        title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
        tel : positions[i].tel,
        image : markerImage // 마커 이미지 
    });
            
    // 마커를 생성하고 지도위에 표시합니다
    addMarker(positions[i]);

}

// 마커를 생성하고 지도 위에 표시하고, 마커에 click 이벤트를 등록하는 함수입니다
function addMarker(position) {

// 마커에 click 이벤트를 등록합니다
kakao.maps.event.addListener(marker, 'click', function() {

    alert("📍이 지점은 "+ position.title + "입니다. \n ☎️ 전화번호 : "+ position.tel);

});
}

function zoomIn()
{
    let level = map.getLevel();
    if(level > 0)
    {
        map.setLevel(level -1);
    }
}

function zoomOut()
{
    let level = map.getLevel();
    if(level < 19)
    {
        map.setLevel(level +1);
    }
}
</script>
</body>
</html>