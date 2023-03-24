$(function(){
	$('.product-favorite').click(function(){
		$.ajax({
			url: '/addtofav.php',
			data:{
				goods_id: $(this).parents('.product-table, .product-line').attr("id"),
				customer_id: $("#customer").attr("data-id")
			},
			success: function(data){
				//alert(data);
				
				switch (data){
					case "Added":
						alert("Товар добавлен в избранное");
						window.location = location.href;
						break;
					case "Removed":
						alert('Товар удален из избранного');						
						window.location = location.href;
						break;
					case "Signout":
						alert('Авторизуйтесь или зарегистрируйтесь');
						break;
					case "Fail":
					default:
						alert("Что-то пошло не так, сообщите, пожалуйста, об ошибке");
						break;
				}
			},

		});
	})
})