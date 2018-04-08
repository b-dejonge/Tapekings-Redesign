var cart = {
	'add': function(product_id, quantity) {
		$.ajax({
			url: './inc/cartadd.php',
			type: 'post',
			data: 'id=' + product_id + '&qty=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			success: function () {location = 'cart'},
			error: function () {}
		});
  },
	'remove': function(key) {
		$.ajax({
			url: './inc/cartremove.php',
			type: 'post',
			data: 'key=' + key,
			success: function () {location = 'cart'},
			error: function () {}
		});
	}
}
