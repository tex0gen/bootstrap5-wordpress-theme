jQuery(document).ready(function($) {

	if ($('.cp').length > 0) {
		function getCookie(cname) {
			var name = cname + "=";
			var decodedCookie = decodeURIComponent(document.cookie);
			var ca = decodedCookie.split(';');

			for(var i = 0; i <ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
						c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}

		var classSet = $('.cp').attr('class').split(" "),
				cp_status = getCookie('cookie_policy');

		if (cp_status !== "1") {
			if ($.inArray('cp-top', classSet) === 1) {
				$('.cp').show(400);
			} else {
				$('.cp').show(400);
			}
		}

		$('.cp .cp-accept').on('click', function(e) {
			e.preventDefault();
			document.cookie = "cookie_policy=1;path=/";
			$('.cp').hide(400);
		});

		$('.cp .cp-decline').on('click', function(e) {
			e.preventDefault();
			window.history.go(-1);
		});
	}
});
