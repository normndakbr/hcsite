document.addEventListener(
	"DOMContentLoaded",
	function () {
		var tooltipTriggerList = [].slice.call(
			document.querySelectorAll('.tooltips')
		);
		tooltipTriggerList.map(function (tooltipTriggerEl) {
			return new bootstrap.Tooltip(tooltipTriggerEl);
		});
	},
	false
);