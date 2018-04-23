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

$('#view-all-btn').click(function functionName(e) {
	e.preventDefault();
	document.getElementById("view-all").style.display = "flex";
	document.getElementById("view-all-btn").style.display = "none";
	document.getElementById("view-less-btn").style.display = "block";
});

$('#view-less-btn').click(function functionName(e) {
	e.preventDefault();
	document.getElementById("view-all").style.display = "none";
	document.getElementById("view-all-btn").style.display = "block";
	document.getElementById("view-less-btn").style.display = "none";
});
