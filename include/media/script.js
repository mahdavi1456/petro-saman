$('input[type="file"]').on('change', function () {
	var file = this.files[0];
	$(this).parent().find('img').attr("src",URL.createObjectURL(file));
});