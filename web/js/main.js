	function  showCart(cart){
		$('#cart .modal-body') .html(cart);
		$('#cart').modal();
	}

	// очистити  кошик
	function clearCart(){
		$.ajax({
			url: '/cart/clear',
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	}

	function getCart(){
		$.ajax({
			url: '/cart/show',
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
		return false;
	}


	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};


$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp',
	        scrollDistance: 300,
	        scrollFrom: 'top',
	        scrollSpeed: 300,
	        easingType: 'linear',
	        animation: 'fade',
	        animationSpeed: 200,
	        scrollTrigger: false,
					//scrollTarget: false,
	        scrollText: '<i class="fa fa-angle-up"></i>',
	        scrollTitle: false,
	        scrollImg: false,
	        activeOverlay: false,
	        zIndex: 2147483647
		});
	});

	$('.add-to-cart').on('click', function (e) {
		e.preventDefault();
		var id = $(this).data('id'),
			qty = $('#qty').val();
		$.ajax({
			url: '/cart/add',
			data: {id: id, qty: qty},
			type: 'GET',
			success: function(res){
				if(!res) alert('Ошибка!');
				showCart(res);
			},
			error: function(){
				alert('Error!');
			}
		});
	});

	$('#cart .modal-body').on('click', '.del-item', function (){
		var id = $(this).data('id');
		$.ajax({
			url: '/cart/del-item',
			data: {id: id },
			type: 'GET',
			success: function (res){
				if (!res) alert('Ошибка!');
				showCart(res);
			},
			error: function (){
				alert('Error!');
			}
		});
	});


});
// кількість товару +-
$(function () {
	$('.add').on('click',function(){
		var $qty=$(this).closest('p').find('.qty');
		var currentVal = parseInt($qty.val());
		if (!isNaN(currentVal) && currentVal < 100) {console.log(currentVal);
			$qty.val(currentVal + 1);
			if(currentVal === 100){

				$('.centerbox').css('border-bottom','3px solid red');
				$('.qty').css('color','red');
			}

		}
	});
	$('.minus').on('click',function(){
		var $qty=$(this).closest('p').find('.qty');
		var currentVal = parseInt($qty.val());
		if (!isNaN(currentVal) && currentVal > 1) {console.log(currentVal);
			$qty.val(currentVal - 1);
			if(currentVal <= 10){

				$('.centerbox').css('border-bottom','1px solid #009688');
				$('.qty').css('color','black');
			}
		}
	});
});

