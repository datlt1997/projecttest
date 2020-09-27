$(document).ready(function($){
	$('.delete-product').click(function(event) {
		var id =$(this).data('id');
		var name =$(this).data('name');
		document.getElementById("delete-name").innerHTML = "Bạn muốn xóa " + name;
		document.getElementById("delete-modal").action =  id + "/delete";
	});
});