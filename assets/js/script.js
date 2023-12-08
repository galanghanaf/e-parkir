$(document).ready(function () {
	$("#tbl_absensi").DataTable({
		order: [],
		columnDefs: [
			{
				targets: "no-sort",
				orderable: false,
			},
		],
	});
});

$(document).ready(() => {
	const togglePassword = document.querySelector("#togglePassword");
	const password = document.querySelector("#password");
	togglePassword.addEventListener("click", () => {
		// Toggle the type attribute using
		// getAttribure() method
		const type =
			password.getAttribute("type") === "password" ? "text" : "password";
		password.setAttribute("type", type);
	});
});

$(document).ready(() => {
	const togglePassword = document.querySelector("#togglePassword2");
	const password = document.querySelector("#password2");
	togglePassword.addEventListener("click", () => {
		// Toggle the type attribute using
		// getAttribure() method
		const type =
			password.getAttribute("type") === "password" ? "text" : "password";
		password.setAttribute("type", type);
	});
});

$(document).ready(() => {
	$("#photo").change(function () {
		const file = this.files[0];
		console.log(file);
		if (file) {
			let reader = new FileReader();
			reader.onload = function (event) {
				console.log(event.target.result);
				$("#imgPreview").attr("src", event.target.result);
			};
			reader.readAsDataURL(file);
		}
	});
});

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

function setClipboard(value) {
	var tempInput = document.createElement("input");
	tempInput.style = "position: absolute; left: -1000px; top: -1000px";
	tempInput.value = value;
	document.body.appendChild(tempInput);
	tempInput.select();
	document.execCommand("copy");
	document.body.removeChild(tempInput);
}

function submitKaryawan(e) {
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
		var departemen = $("#departemen").val(); /* Grab input from email field */
		var nik = $("#nik").val(); /* Grab input from email field */
		var nama = $("#nama").val(); /* Grab input from email field */
		var plant = $("#plant").val(); /* Grab input from email field */

		if (result.isConfirmed) {
			if (plant != "") {
				if (departemen != "") {
					/* if email is not empty */
					if (nik != "") {
						if (nama != "") {
							/* if message is not empty */
							document.getElementById("formUser").submit();
						} else {
							Swal.fire("Gagal", "Nama Wajib Di Isi!", "info");
						}
					} else {
						Swal.fire("Gagal", "NIK Wajib Di Isi!", "info");
					}
				} else {
					Swal.fire("Gagal", "Departemen Wajib Disi!", "info");
				}
			} else {
				Swal.fire("Gagal", "Plant Wajib Disi!", "info");
			}
		}
	});
}

function submitKendaraan(e) {
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
		var no_sim = $("#no_sim").val(); /* Grab input from email field */
		var nik = $("#nik").val(); /* Grab input from email field */
		var nama = $("#nama").val(); /* Grab input from email field */
		var plant = $("#plant").val(); /* Grab input from email field */
		var no_kendaraan = $("#no_kendaraan").val(); /* Grab input from textarea */
		var jenis_kendaraan =
			$("#jenis_kendaraan").val(); /* Grab input from textarea */
		if (result.isConfirmed) {
			if (nik != "" || nama != "" || plant != "") {
				if (no_sim != "") {
					/* if email is not empty */
					if (no_kendaraan != "") {
						if (jenis_kendaraan != "") {
							/* if message is not empty */
							document.getElementById("formUser").submit();
						} else {
							Swal.fire("Gagal", "Jenis Kendaraan Wajib Di Isi!", "info");
						}
					} else {
						Swal.fire("Gagal", "Nomor Kendaraan Wajib Di Isi!", "info");
					}
				} else {
					Swal.fire("Gagal", "Nomor SIM Wajib Disi!", "info");
				}
			} else {
				Swal.fire("Gagal", "Pastikan Semua Data Wajib Di Isi!", "info");
			}
		}
	});
}
function tambahDataUser(e) {
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
		var departemen = $("#departemen").val(); /* Grab input from email field */
		var nik = $("#nik").val(); /* Grab input from email field */
		var nama = $("#nama").val(); /* Grab input from email field */
		var plant = $("#plant").val(); /* Grab input from email field */
		var username = $("#username").val(); /* Grab input from textarea */
		var password = $("#password").val(); /* Grab input from textarea */
		if (result.isConfirmed) {
			if (nik != "" || nama != "" || plant != "") {
				if (departemen != "") {
					/* if email is not empty */
					if (username != "") {
						if (password != "") {
							/* if message is not empty */
							document.getElementById("formUser").submit();
						} else {
							Swal.fire("Gagal", "Password Wajib Di Isi!", "info");
						}
					} else {
						Swal.fire("Gagal", "Username Wajib Di Isi!", "info");
					}
				} else {
					Swal.fire("Gagal", "Departemen Wajib Disi!", "info");
				}
			} else {
				Swal.fire("Gagal", "Pastikan Semua Data Wajib Di Isi!", "info");
			}
		}
	});
}

// Start SweetAlert Delete
function logout(url) {
	Swal.fire({
		title: "Apakah Anda Yakin?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DC3545",
		cancelButtonColor: "#6C757D",
		confirmButtonText: "Ya, Keluar!",
		cancelButtonText: "Batal",
	}).then((result) => {
		if (result.isConfirmed) {
			window.location.href = url;
		}
	});
}
