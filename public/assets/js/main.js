$(document).ready(function($){
	$('.delete-product').click(function(event) {
		var id =$(this).data('id');
		var name =$(this).data('name');
		document.getElementById("delete-name").innerHTML = "Bạn muốn xóa " + name;
		document.getElementById("delete-modal").action =  id + "/delete";
	});
	// $.('searchuser').click(function(event) {
	// 	var keyword =document.getElementByClassName('keyword');
	// 	var selectuser =document.getElementByClassName('selectuser');
	// 	$.ajax({
	// 		url : 'search/keyword=' + keyword + '&selectuser=' + selectuser,
	// 		type : 'get',
	// 		data : {
	// 			keyword : keyword,
	// 			selectUser :selectuser,
	// 		}, 
	// 		success : function(data) {

	// 		}
	// 	})
	// })
});