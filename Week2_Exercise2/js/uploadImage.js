dropContainer.ondragover = dropContainer.ondragenter = function(e) {
	e.preventDefault();
};
nodrag.ondragover = nodrag.ondrop = nodrag.ondragenter = function(e) {
	e.preventDefault();
};
dropContainer.ondrop = function(e) {
	fileInput.files = e.dataTransfer.files;
	e.preventDefault();
	var files = e.dataTransfer.files[0];
	var reader = new FileReader();
	reader.readAsDataURL(files);
	reader.onload = function() {
		var imgSrc = reader.result;
		console.log(imgSrc);
		var img = document.getElementById("previewimg");
		img.style.display = "inline-block";
		img.src = imgSrc;
	};
};

function preview(obj) {
	var img = document.getElementById("previewimg");
	img.style.display = "inline-block";
	img.src = window.URL.createObjectURL(obj.files[0]);
}
$("#dropContainer").click(function(){
	$("#fileInput").click();
});