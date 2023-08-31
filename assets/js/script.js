

// Start SweetAlert Delete
function deleteResult(url) {
	Swal.fire({
		title: "Apakah Anda Yakin?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DC3545",
		cancelButtonColor: "#6C757D",
		confirmButtonText: "Ya, Hapus!",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = url;
		}
	});
}
// Start SweetAlert Delete
function activityCheckOut(url) {
	Swal.fire({
		title: "Apakah Anda Yakin?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DC3545",
		cancelButtonColor: "#6C757D",
		confirmButtonText: "Ya, Checkout!",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = url;
		}
	});
}
// End SweetAlert DataTables Delete

function submitResultProsesVisual(e) {
	e.preventDefault();
	Swal.fire({
		title: "Apakah Anda Yakin?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#198754",
		cancelButtonColor: "#DC3545",
		confirmButtonText: "Ya, Simpan!",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			document.getElementById("formProsesVisual").submit();
		}
	});
}

function submitResultUser(e) {
	e.preventDefault();
	Swal.fire({
		title: "Apakah Anda Yakin?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#198754",
		cancelButtonColor: "#DC3545",
		confirmButtonText: "Ya, Simpan!",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			document.getElementById("formUser").submit();
		}
	});
}

