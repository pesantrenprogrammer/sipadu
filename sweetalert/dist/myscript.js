const flashData= $('.flash-data').data('flashdata');
//console.log(flashData);

if(flashData=='Tersimpan'|flashData=='Diedit'|flashData=='Dihapus'){
  const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
  });
  swalWithBootstrapButtons.fire({
    title: 'Data Tersebut',
    text: 'Berhasil ' + flashData,
    icon:'success',
    confirmButtonText: 'Ok'
  });
}
if(flashData=='Gagal'){
  const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-danger',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
  });
  swalWithBootstrapButtons.fire({
    title: 'Gagal Login',
    text: 'Email/NIA atau Pasword yang dimasukkan salah/belum terdaftar',
    icon:'warning',
    confirmButtonText: 'Login Ulang'
  });
}
if(flashData=='Terpakai'){
  const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-danger',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
  });
  swalWithBootstrapButtons.fire({
    title: 'Gagal Input',
    text: 'Email yang dimasukkan sudah terpakai, silakan masukkan email lain',
    icon:'warning',
    confirmButtonText: 'Input Ulang'
  });
}


//Tombol hapus
$('.tombol-hapus').on('click', function(e){
  e.preventDefault();
  const href = $(this).attr('href');
      Swal.fire({
    title: 'Apakah Benar',
    text: "Akan Menghapus Data ini?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data!'
    }).then((result) => {
    if (result.isConfirmed) {
      document.location.href=href;
    }
    })
});
