// Toggle Sidebar
const hide_sidebar = () => {
  const sidebar = document.getElementById('sidebar')
  const hide_sidebar_icon = document.getElementById('bi-chevron-double-left')
  const show_sidebar_icon = document.getElementById('bi-chevron-double-right')
  const header = document.getElementById('header')
  const main = document.getElementById('main')
  const table = document.getElementsByClassName('table')

  sidebar.style.left = '-15vw'
  header.style.width = '100vw'
  header.style.left = '0'
  main.style.left = '0'
  main.style.width = '100vw'
  hide_sidebar_icon.style.display = 'none'
  show_sidebar_icon.style.display = 'block'
  table.style.width = '80%'
}

const show_sidebar = () => {
  const sidebar = document.getElementById('sidebar')
  const show_sidebar_icon = document.getElementById('bi-chevron-double-right')
  const hide_sidebar_icon = document.getElementById('bi-chevron-double-left')
  const main = document.getElementById('main')
  sidebar.style.left = '0'
  header.style.width = '85vw'
  header.style.left = '15vw'
  main.style.left = '15vw'
  main.style.width = '85vw'
  show_sidebar_icon.style.display = 'none'
  hide_sidebar_icon.style.display = 'block'
}
// Akhir Toggle Sidebar

// Menampilkan Jam
function showTime() {
  let today = new Date()
  let j = today.getHours()
  let m = today.getMinutes()
  let d = today.getSeconds()
  j = checkTime(j)
  m = checkTime(m)
  d = checkTime(d)
  document.getElementById('jam').innerHTML = j + ':' + m + ':' + d
}

function checkTime(i) {
  if (i < 10) {
    i = '0' + i
  }
  return i
}
setInterval(showTime, 1000)
// Akhir menapilkan Jam

// Menampilkan hari
var months = [
  'Januari',
  'Februari',
  'Maret',
  'April',
  'Mei',
  'Juni',
  'Juli',
  'Agustus',
  'September',
  'Oktober',
  'November',
  'Desember',
]
var myDays = [
  'Minggu',
  'Senin',
  'Selasa',
  'Rabu',
  'Kamis',
  'Jum&#39;at',
  'Sabtu',
]
var date = new Date()
var day = date.getDate()
var month = date.getMonth()
var thisDay = date.getDay(),
  thisDay = myDays[thisDay]
var yy = date.getYear()
var year = yy < 1000 ? yy + 1900 : yy
if (day < 10) {
  document.getElementById('hari').innerHTML =
    thisDay + ', ' + '0' + day + ' ' + months[month] + ' ' + year + ' '
} else {
  document.getElementById('hari').innerHTML =
    thisDay + ', ' + day + ' ' + months[month] + ' ' + year + ' '
}
// Akhir Menampilkan hari

// Show Hide Password
const toggle_password_input = document.querySelector('#toggle_password_input')
const bi_eye_password = document.querySelector('#bi-eye-password')
const bi_eye_slash_password = document.getElementById('bi-eye-slash-password')
const password_input = document.getElementById('password_input')
function toggle_password() {
  if (password_input.type === 'password') {
    password_input.type = 'text'
    bi_eye_password.classList.toggle('d-none')
    bi_eye_slash_password.classList.remove('d-none')
    console.log(1)
  } else {
    password_input.type = 'password'
    bi_eye_password.classList.toggle('d-none')
    bi_eye_password.classList.remove('d-block')
    bi_eye_slash_password.classList.add('d-none')
  }
}

// Show Hide Old Password
const toggle_old_password_input = document.querySelector(
  '#toggle_old_password_input',
)
const bi_eye_old_password = document.querySelector('#bi-eye-old-password')
const bi_eye_slash_old_password = document.getElementById(
  'bi-eye-slash-old-password',
)
const old_password_input = document.getElementById('old_password_input')
function toggle_old_password() {
  console.log('old')
  if (old_password_input.type === 'password') {
    old_password_input.type = 'text'
    bi_eye_old_password.classList.toggle('d-none')
    bi_eye_slash_old_password.classList.remove('d-none')
    console.log(1)
  } else {
    old_password_input.type = 'password'
    bi_eye_old_password.classList.toggle('d-none')
    bi_eye_old_password.classList.remove('d-block')
    bi_eye_slash_old_password.classList.add('d-none')
  }
}

// Show Hide Confirm Password
const toggle_password_input_confirm = document.querySelector(
  '#toggle_password_input_confirm',
)
const bi_eye_password_confirm = document.querySelector(
  '#bi-eye-password-confirm',
)
const bi_eye_slash_password_confirm = document.getElementById(
  'bi-eye-slash-password-confirm',
)
const password_input_confirm = document.getElementById('password_input_confirm')
function toggle_password_confirm() {
  if (password_input_confirm.type === 'password') {
    password_input_confirm.type = 'text'
    bi_eye_password_confirm.classList.toggle('d-none')
    bi_eye_slash_password_confirm.classList.remove('d-none')
    console.log(1)
  } else {
    password_input_confirm.type = 'password'
    bi_eye_password_confirm.classList.toggle('d-none')
    bi_eye_password_confirm.classList.remove('d-block')
    bi_eye_slash_password_confirm.classList.add('d-none')
  }
}

// Open Menu Master Sidebar
const chevron_menu_master = document.getElementById('chevron-menu-master')
const menu_master = document.getElementById('menu-master')
const sub_menu_master = document.getElementById('sub-menu-master')

menu_master.addEventListener('click', function () {
  chevron_menu_master.classList.toggle('rotate-menu-master')
  sub_menu_master.classList.toggle('sub-menu-show')
})

// Hak Akses
const hak_akses = document.getElementsByClassName('hak-akses')
const sub_hak_akses = document.getElementsByClassName('sub-hak-akses')

const check_all = document.getElementById('check_all')
const label_check_all = document.getElementById('label_check_all')
const spopd = document.getElementById('SPOPD')
const pendaftaran = document.getElementById('PENDAFTARAN')
const verval = document.getElementById('VERVAL')
const verifikasi_jr = document.getElementById('VERIFIKASI JR')
const penetapan = document.getElementById('PENETAPAN')
const ubah_biaya = document.getElementById('UBAH BIAYA')
const fiskal = document.getElementById('FISKAL')
const cetak_stnk = document.getElementById('CETAK STNK')
const hapus_transaksi = document.getElementById('HAPUS TRANSAKSI')
const pencarian_dan_perubahan_data = document.getElementById(
  'PENCARIAN DAN PERUBAHAN DATA',
)
const hapus_kendaraan = document.getElementById('HAPUS KENDARAAN')
const laporan = document.getElementById('LAPORAN')

// Check All
check_all.addEventListener('change', function () {
  if (this.checked) {
    label_check_all.innerHTML = 'Batalkan semua?'
    for (hk of hak_akses) {
      hk.checked = true
    }
    for (shk of sub_hak_akses) {
      shk.checked = true
    }
  } else {
    label_check_all.innerHTML = 'Pilih semua?'
    for (hk of hak_akses) {
      hk.checked = false
    }
    for (shk of sub_hak_akses) {
      shk.checked = false
    }
  }
})

// for (hk of hak_akses) {
//   hk.addEventListener('change', function () {
//     if (this.checked) {
//       for (shk of sub_hak_akses) {
//         if (this.value == shk.id) {
//           shk.checked = true
//         } else {
//           shk.checked = false
//         }
//       }
//     } else {
//       for (shk of sub_hak_akses) {
//         if (this.value == shk.id) {
//           shk.checked = false
//         }
//       }
//     }
//   })
// }
