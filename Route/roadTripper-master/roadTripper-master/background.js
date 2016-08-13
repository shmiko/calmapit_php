$(document).ready(function(){
    var classCycle=['https://s3.amazonaws.com/ooomf-com-files/gQZ2iaRdRoWKahCTncS1_brooklyn-bridge.jpg','https://s3.amazonaws.com/ooomf-com-files/SxzoRwBVRgiIliTBXr2h_kyoyo.jpg'
    ,'https://s3.amazonaws.com/ooomf-com-files/QAdTsSj8TOOWzlyLn3Rg_14248396556_aefcd9a926_o.jpg','https://s3.amazonaws.com/ooomf-com-files/74xDBSTTjJdmPG76VpZw_2.JPG'
    ,'https://s3.amazonaws.com/ooomf-com-files/wkjFpgTwSPnxksbAxnkA_IMG_5192.jpg','https://s3.amazonaws.com/ooomf-com-files/hBd6EPoQT2C8VQYv65ys_White%20Sands.jpg'
    ,'https://s3.amazonaws.com/ooomf-com-files/CFHakpPkTE2zdJUp9AlO_IMG_0906.JPG'];

    var randomNumber = Math.floor(Math.random() * classCycle.length);
    var classToAdd = classCycle[randomNumber];
    console.log(classToAdd);
    
    $('body').css('background-image', 'url(' + classToAdd + ')');

});







// var picture = min + Math.floor(Math.random() * (1 - 7 + 1));
// switch (picture) {
// 	case 1:
// 		$('#body').css('background-image', 'url(https://s3.amazonaws.com/ooomf-com-files/gQZ2iaRdRoWKahCTncS1_brooklyn-bridge.jpg)');
// 		break;
// 	case 2:
// 		$('#body').css('background-image', 'url(https://s3.amazonaws.com/ooomf-com-files/SxzoRwBVRgiIliTBXr2h_kyoyo.jpg)');
// 		break;
// 	case 3:
// 		$('#body').css('background-image', 'url(https://s3.amazonaws.com/ooomf-com-files/QAdTsSj8TOOWzlyLn3Rg_14248396556_aefcd9a926_o.jpg)');
// 		break;
// 	case 4:
// 		$('#body').css('background-image', 'url(https://s3.amazonaws.com/ooomf-com-files/74xDBSTTjJdmPG76VpZw_2.JPG)');
// 		break;
// 	case 5:
// 		$('#body').css('background-image', 'url(https://s3.amazonaws.com/ooomf-com-files/wkjFpgTwSPnxksbAxnkA_IMG_5192.jpg)');
// 		break;
// 	case 6:
// 		$('#body').css('background-image', 'url(https://s3.amazonaws.com/ooomf-com-files/hBd6EPoQT2C8VQYv65ys_White%20Sands.jpg)');
// 		break;
// 	case 7:
// 		$('#body').css('background-image', 'url(https://s3.amazonaws.com/ooomf-com-files/CFHakpPkTE2zdJUp9AlO_IMG_0906.JPG)');
// 		break;
// }