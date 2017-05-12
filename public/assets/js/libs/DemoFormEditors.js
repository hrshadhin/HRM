(function (namespace, $) {
	"use strict";

	var DemoFormEditors = function () {
		// Create reference to this instance
		var o = this;
		// Initialize app when document is ready
		$(document).ready(function () {
			o.initialize();
		});

	};
	var p = DemoFormEditors.prototype;

	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function () {
		this._initSummernote();

	};

	// =========================================================================
	// SUMMERNOTE EDITOR
	// =========================================================================

	p._initSummernote = function () {
		if (!$.isFunction($.fn.summernote)) {
			return;
		}

		// Full toolbar
		$('#summernote').summernote();
		
		// Simple toolbar
		$('#simple-summernote').summernote({
			height: $('#simple-summernote').height(),
			toolbar: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['height', ['height']]
			]
		});
	};



	// =========================================================================
	namespace.DemoFormEditors = new DemoFormEditors;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
