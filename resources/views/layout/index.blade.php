<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('assets/css/dataTables.bootstrap.css')}}" />
    
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="shortcut icon" href={{url("/assets/img/favicon.png")}} sizes="40x40" type="image/png"> 
       
    <link rel="stylesheet" href={{url("assets/css/select2.min.css")}}>
    {{-- Font --}}
    <link href={{url("assets/font/Roboto.css")}} rel="stylesheet">
    

    

    
    
    <title>@yield('title')</title>
    </head>
    <body>
        
        @include("components.header")
        @include("components.aside")
        @include("components.main")
        {{-- @include("components.footer") --}}
    
        
    <script src="{{url('assets/js/main.js')}}"></script>
    <script src="{{url('assets/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/select2.min.js')}}"></script>
    
    <script src="{{url("assets/js/sweetalert2.js")}}"></script>
    <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/js/dataTables.js')}}"></script>
    <script src="{{url('assets/js/dataTables.bootstrap.js')}}"></script>
    
    <script text="">
        $('.select2').select2({
            "language": {
            "noResults": function(){
                return "Data tidak ditemukan";
                }
            }
        })

        $('#level-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("level")!!}',
                type: 'GET'
            },
            columns: [
                {data: 'id',
                 className: 'text-center'
                }, 
                {data: 'level'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            }

                 
        })

        $('#mutasi-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("mutasi")!!}',
                type: 'GET'
            },
            columns: [
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                },  
                {data: null, 
                "render": function (data, type, row, meta) {
                        if(row.jenis_mutasi == 1){
                            return 'UPPD Lain'
                        }else{
                            return 'SKPD Lain'
                        }
                    }, 
                    className: 'text-center'
                },
                {data: 'nama_pegawai'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            }

                 
        })

        // Datatable History User Samsat
        $('#histori-user-samsat-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("histori-user-samsat")!!}',
                type: 'GET'
            },
            columns: [
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                }, 
                {data: 'nama_alias', },
                {data: 'nama_titik_layanan'},
                {data: 'nama_uppd'},
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })

        // Datatable Pejabat
        $('#pejabat-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("pejabat")!!}',
                type: 'GET'
            },
            columns: [
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                },
                {data: 'ka_uppd', },
                {data: 'kasi_pkb'},
                {data: 'bend_penerimaan'},
                {data: 'nama_uppd'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })

        // Datatable User Samsat
        $('#user-samsat-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("user-samsat")!!}',
                type: 'GET',
                datatype: 'json',
            },
            columns: [
                
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                },  
                {data: 'nama_alias'},
                {data: 'is_active',
                    className: 'text-center'
                },
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data", 
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })

        // Datatable Kategori Titik Layanan
        $('#kategori-titik-layanan-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("kategori-titik-layanan")!!}',
                type: 'GET'
            },
            columns: [
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                },  
                {data: 'nama_titik_layanan'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })

        // Datatable Kategori Pegawai
        $('#kategori-pegawai-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("kategori-pegawai")!!}',
                type: 'GET'
            },
            columns: [
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                }, 
                {data: 'kategori_pegawai'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })

        
        // Datatable Hak Akses Menu
        $('#hak-akses-menu-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("hak-akses-menu")!!}',
                type: 'GET'
            },
            columns: [
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                },  
                {data: 'hak_akses_menu'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            }

                 
        })

        // Datatable UPPD
        $('#uppd-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("uppd")!!}',
                type: 'GET'
            },
            columns: [
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                },  
                {data: 'nama_uppd'},
                {data: 'alamat'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })

        // Datatable Lokasi
        $('#lokasi-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            ajax: {
                url: '{!!route("lokasi")!!}',
                type: 'GET',
                
            },
            columns: [
                {data: 'id',
                 className: 'text-center'
                }, 
                {data: 'level'},
                {data: 'nama_uppd'},
                {data: 'kode_lokasi',
                    className: 'text-center'
                },
                {data: 'lokasi'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",

            }

                 
        })

        // Datatable Pegawai
        $('#pegawai-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,

            ajax: {
                url: '{!!route("pegawai")!!}',
                type: 'GET',
                
            },
            columns: [
                { "data": null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                }, 
                {data: 'nama_pegawai'},
                {data: 'nip'},
                {data: 'kategori_pegawai',
                    className: 'text-center'
                },
                {data: 'nama_uppd'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })

        // Datatable Pengguna
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            "order": [[ 1, 'asc' ]],
            ajax: {
                url: '{!!route("pengguna")!!}',
                type: 'GET',
                
            },
            columns: [
                { "data": null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                }, 
                {data: 'name'},
                {data: 'username'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })

        // Datatable Titik Layanan
        $('#titik-layanan-table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!!route("titik-layanan")!!}',
                type: 'GET',
                
            },
            columns: [
                {data: null,"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }, 
                    className: 'text-center'
                }, 
                {data: 'lokasi_id'},
                {data: 'nama_titik_layanan'},
                {data: 'kategori_titik_layanan'},
                {data: 'nama_uppd'},
                {data: 'action',
                    className: 'text-center'
                },
            ],
            "language": {
                "zeroRecords": "Data tidak ditemukan",
                "infoEmpty": "Data tidak ditemukan",
                "loadingRecords": "Silahkan tunggu...",
                "search": "Cari : ",
                "lengthMenu":     "_MENU_ Data per halaman",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sEmptyTable": "Data belum tersedia"
            }

                 
        })
    </script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            
            

            // Dropdown UPPD Mutasi Pegawai
            $('#pilih-uppd-mutasi-pegawai').on('change', function(){
                let id = $(this).val()
                
                $('.loading-select-pegawai-mutasi').css('display', 'block')
                $('#pilih-pegawai-mutasi').html('')
                $('#pilih-pegawai-mutasi').prop('disabled', false)
                $.ajax({
                    url: '/selectPegawai/'+id,
                    type: 'GET',
                    success:function({data}){
                        $(".loading-select-pegawai-mutasi").hide();
                        $('#pilih-pegawai-mutasi').append('<option value="">-- Pilih Pegawai --</option>')
                        $('#pilih-pegawai-user-samsat').prop("disabled", false)
                        $.map(data, function(item){
                            $('#pilih-pegawai-mutasi').append('<option value='+item.id+'>'+item.nama_pegawai+'</option>')
                        })

                    },
                    error:function(){
                        $('#pilih-pegawai-user-samsat').append('<option>Silahkan pilih titik layanan terlebih dahulu</option>')
                        $('#pilih-pegawai-user-samsat').prop("disabled", true)
                        $(".loading-select").hide();
                        $(".loading-select-pegawai").hide();
                    }
                })
            });

            // Jenis Mutasi
            $('#jenis_mutasi').on('change', function(){
                let id = $(this).val()
                if(id == 1){
                    $('#tujuan_mutasi').show()
                }else{
                    $('#tujuan_mutasi').hide()
                }
            })

            // Dropdown UPPD User Samsat
            $('#pilih-uppd-user-samsat').on('change', function(){
                let id = $(this).val()
                
                $('.loading-select').css('display', 'block')
                $('#pilih-titik-layanan-user-samsat').html('')
                $('#pilih-pegawai-user-samsat').html('')                
                $.ajax({
                    url: '/selectTitikLayanan/'+id,
                    type: 'GET',
                    success:function({data}){
                        $('.loading-select').hide()
                        if(id !== null){
                            $('#pilih-titik-layanan-user-samsat').prop("disabled", false)
                        }
                        $('#pilih-titik-layanan-user-samsat').append('<option value="">-- Pilih Titik Layanan --</option>')
                        $.map(data, function(item){

                                $('#pilih-titik-layanan-user-samsat').append('<option value='+item.lokasi_id+'>'+item.nama_titik_layanan+'</option>')
                            
                        })
                    },
                    error:function(){
                        $('#pilih-titik-layanan-user-samsat').append('<option value="">Silahkan pilih UPPD terlebih dahulu</option>')
                        $('#pilih-pegawai-user-samsat').append('<option value="">Silahkan pilih Titik Layanan terlebih dahulu</option>')
                        $('#pilih-titik-layanan-user-samsat').prop("disabled", true)
                        $(".loading-select").hide();
                    }
                   
                }),

                $.ajax({
                    url: '/selectPegawai/'+id,
                    type: 'GET',
                    success:function({data}){
                        $(".loading-select-pegawai").hide();
                        $('#pilih-pegawai-user-samsat').append('<option value="">-- Pilih Pegawai --</option>')
                        $('#pilih-pegawai-user-samsat').prop("disabled", false)
                        $.map(data, function(item){
                            $('#pilih-pegawai-user-samsat').append('<option value='+item.id+'>'+item.nama_pegawai+'</option>')
                        })

                    },
                    error:function(){
                        $('#pilih-pegawai-user-samsat').append('<option>Silahkan pilih UPPD terlebih dahulu</option>')
                        $('#pilih-pegawai-user-samsat').prop("disabled", true)
                        $(".loading-select").hide();
                        $(".loading-select-pegawai").hide();
                    }
                })
            });

            
            // Dropdown Tambah Pegawai
            $('#pilih-uppd-pegawai').on('change', function(){
                let id = $(this).val()
                $('#pilih-titik-layanan-pegawai').html('')
                $('#pilih-titik-layanan-pegawai').prop('disabled', false)
                $.ajax({
                    url: '/selectTitikLayanan/'+id,
                    type: 'GET',
                    success:function({data}){
                        $('#pilih-titik-layanan-pegawai').append('<option>Pilih</option>')
                        $.map(data, function(item){

                                $('#pilih-titik-layanan-pegawai').append('<option value='+item.lokasi_id+'>'+item.nama_titik_layanan+'</option>')
                            
                        })
                    }
                })
            });

             // Dropdown Ubah Pegawai
             $('#pilih-ubah-uppd-pegawai').on('change', function(){
                let id = $(this).val()
                console.log(id)
                $('#pilih-ubah-titik-layanan-pegawai').html('')
                $.ajax({
                    url: '/selectTitikLayanan/'+id,
                    type: 'GET',
                    success:function({data}){
                        $('#pilih-ubah-titik-layanan-pegawai').append('<option>Pilih</option>')
                        $.map(data, function(item){

                                $('#pilih-ubah-titik-layanan-pegawai').append('<option value='+item.id+'>'+item.nama_titik_layanan+'</option>')
                            
                        })
                    }
                })
            });

            // Detail Titik Layanan
            $('body').on('click', '#btn-detail-titik-layanan', function(){
                let data = $(this).data()
                $('#modal-detail-titik-layanan').modal('show')
                $('#detail-uppd-titik-layanan').val(data.uppd)
                $('#detail-kat-titik-layanan').val(data.kategoriTitikLayanan)
                $('#detail-nama-titik-layanan').val(data.titikLayanan)
                console.log(data)
            })

            // detail Kategori Titik Layanan
            $('body').on('click', '#btn-detail-kategori-titik-layanan', function(){
                let data = $(this).data('kategoriTitikLayanan')
                $('#modal-detail-kategori-titik-layanan').modal('show')
                $('#detail-kategori-titik-layanan').val(data)
            })

            // detail Hak Akses Menu
            $('body').on('click', '#btn-detail-hak-akses-menu', function(){
                let data = $(this).data('hakAksesMenu')
                $('#modal-detail-hak-akses-menu').modal('show')
                $('#detail-hak-akses-menu').val(data)
            })

            // detail Kategori Pegawai
            $('body').on('click', '#btn-detail-kategori-pegawai', function(){
                let data = $(this).data('kategoriPegawai')
                $('#modal-detail-kategori-pegawai').modal('show')
                $('#detail-kategori-pegawai').val(data)
            })

            $('body').on('click', '.btn-close', function(){
                $('form').trigger('reset')
            })

            // Open Modal Tambah User
            $('body').on('click', '#btn-modal-tambah-user', function(){
                $('#modal-tambah-user').modal('show')
            })

            // Detail Lokasi
            $('body').on('click', '#btn-detail-lokasi', function(){
                let data = $(this).data()
                let id = data.id
                let level = data.level
                let uppd = data.uppd
                let kode = data.kodeLokasi
                let lokasi = data.lokasi
                
                $.ajax({
                    type: 'GET',
                    url: `{{url('lokasi/show')}}/${id}`,
                    data: {id: id},
                    success:function(res){
                        console.log(data)
                        $('#modal-detail-lokasi').modal('show')
                        $('#detail-lokasi').val(lokasi)
                        $('#detail-kode-lokasi').val(kode)
                        $('#detail-uppd-lokasi').val(uppd)
                        $('#detail-level-lokasi').val(level)
                    },
                    error:function(err){
                    }
                })
            })

            // Ubah Lokasi
            $('body').on('click', '#btn-ubah-lokasi', function(){
                let data = $(this).data()
                let id_ubah_level = data.level_id
                console.log(data)
                $.ajax({
                    url: '{{url("lokasi")}}'+'/'+id_ubah_level+'/edit',
                    method: 'GET',
                    success:function(res){
                        
                        let level = data.levelId
                        $('#modal-ubah-lokasi').modal('show')                        
                        $('#select-ubah-level-lokasi').select2({
                            dropdownParent: $('#modal-ubah-lokasi'),
                            placeholder: 'Pilih Level',
                            ajax: {
                                url: "{{url('level/data')}}"+'/',
                                dataType: 'json',
                                processResults:function({data}){
                                    return{
                                        results: $.map(data, function(item){
                                            return{
                                                id: item.id,
                                                text:'['+item.id.toString().padStart(2, '0')+ '] - '+item.level
                                            }
                                        })
                                    }
                                }
                            }
                        })
                        $('#select-ubah-level-lokasi').val()
                        $('#ubah-kode-lokasi').val(data.kodeLokasi)
                        $('#ubah-lokasi').val(data.lokasi)
                        // $('modal').show()
                        // $('#id_uppd').val(res.id)
                        // $('#nama-uppd').val(res.nama_uppd)
                        // $('#wilayah-kerja').val(res.wilayah_kerja)
                        // $('#kota').val(res.kota)
                    },
                    error:function(err){
                        alert('no')
                    }
                })
            })

            // Open Modal Tambah UPPD
            $('body').on('click', '#btn-modal-tambah-uppd', function(){
                $('#modal-tambah-uppd').modal('show')
                $('#nama-uppd-input').focus()
            })

            // Tambah UPPD
            $("#btn-tambah-uppd").click(function(e){ 
                console.log()               
                e.preventDefault()
                let nama_uppd = $('#nama-uppd-input').val()
                let wilayah_kerja = $('#wilayah-kerja-input').val()
                let kota = $('#kota-input').val()
                let _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('uppd.store') }}",
                    type:'POST',
                    data:{_token:_token,nama_uppd:nama_uppd, wilayah_kerja:wilayah_kerja, kota:kota},
                    success:function(response){
                        if (response.success == true) {
                                $('#form-tambah-uppd').trigger('reset')
                                $('#modal-tambah-uppd').modal('hide')
                                $('.modal-backdrop').remove()
                                }  
                                $('#uppd-table').DataTable().ajax.reload();
                                Swal.fire({
                                    icon: "success",
                                    title: "Data berhasil disimpan",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                
                    },
                    error: function(err) {
                        console.log(err)
                        $('#nama-uppd-input').focus().focus();
                        if(err.responseJSON.nama_uppd){
                            document.getElementById("nama-uppd-error-tambah").innerHTML =err.responseJSON.nama_uppd;
                        }
                        if(err.responseJSON.wilayah_kerja){
                            document.getElementById("wilayah-kerja-error-tambah").innerHTML =err.responseJSON.wilayah_kerja;
                        }
                        if(err.responseJSON.kota){
                            document.getElementById("kota-uppd-error-tambah").innerHTML =err.responseJSON.kota;
                        }
                    }
                });
            })
            
            // Detail UPPD
            $('body').on('click', '#btn-detail-uppd',function () {
                let data = $(this).data()
                let id = data.id
                console.log(data)
                $.ajax({
                    type: 'GET',
                    url: `{{url('uppd/show')}}/${id}`,
                    data: {id: id},
                    success:function(res){
                        console.log(id)
                        $('.modal-content .modal-body .modal-dialog').html(res) 
                        $('#modal-detail-uppd').modal('show')
                        $('#detail-nama-uppd').val(data.nama_uppd)
                        $('#detail-wilayah-uppd').val(data.wilayahKerja)
                        $('#detail-kota-uppd').val(data.kota)
                    },
                    error:function(err){
                        alert(err)
                        $('#modal-detail-uppd').modal('show')
                        $('modal').show()
                    }
                })
            })

            // Edit UPPD
            $('body').on('click', '#btn-edit-uppd', function(){
                let data = $(this).data()
                let id = data.id
                $.ajax({
                    url: '{{url("uppd")}}'+'/'+id+'/edit',
                    method: 'GET',
                    success:function(res){
                        $('#modal-ubah-uppd').modal('show')
                        $('modal').show()
                        $('#id_uppd').val(res.id)
                        $('#nama-uppd').val(res.nama_uppd)
                        $('#wilayah-kerja').val(res.wilayah_kerja)
                        $('#kota').val(res.kota)
                    },
                    error:function(err){

                    }
                })
            })

            // Update UPPD
            $("#btn-update-uppd").on('click',function(e){
                e.preventDefault()
                let id = $('#id_uppd').val() 
                data = {
                    'id': id,
                    'nama_uppd' : $('#nama-uppd').val(),
                    'wilayah_kerja' : $('#wilayah-kerja').val(),
                    'kota' : $('#kota').val(),
                }
                $.ajax({
                    url: '/uppd/update/'+id,
                    type :'PATCH',
                    data: data,
                    dataType: false,
                    success:function(res){
                        console.log(data)
                        $('#form-uppd-update').trigger('reset')
                        $('#modal-ubah-uppd').modal('hide')
                        $('.modal-backdrop').remove()
                        $('#uppd-table').DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "Data berhasil diubah",
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    error: function(err) {
                        console.log(err)
                        $('#modal-ubah-uppd').modal('show')
                        if(err.responseJSON.nama_uppd){}
                        document.getElementById("nama-uppd-error-update").innerHTML =err.responseJSON.nama_uppd;
                        if(err.responseJSON.wilayah_kerja){
                            document.getElementById("wilayah-kerja-error-update").innerHTML =err.responseJSON.wilayah_kerja;
                        }
                        if(err.responseJSON.kota){
                            document.getElementById("kota-uppd-error-update").innerHTML =err.responseJSON.kota;
                        }
                    }
                });
            })

            // Delete User Samsat
            $('body').on('click', '#btn-delete-user-samsat',function(){
                console.log(89)
                let data = $(this).data()
                let id = data.id
                Swal.fire({
                    title: 'Hapus User!',
                    text: 'Anda akan menghapus user?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/user_samsat/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        $('#user-samsat-table').DataTable().ajax.reload();
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#uppd-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

            // Delete User
            $('body').on('click', '#btn-delete-user',function(){
                console.log(89)
                let data = $(this).data()
                let id = data.id
                Swal.fire({
                    title: 'Hapus User!',
                    text: 'Anda akan menghapus user?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/pengguna/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        $('#user-table').DataTable().ajax.reload();
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#uppd-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

            // Delete Pejabat
            $('body').on('click', '#btn-delete-pejabat',function(){
                console.log(89)
                let data = $(this).data()
                let id = data.id
                Swal.fire({
                    title: 'Hapus Pejabat!',
                    text: 'Anda akan menghapus pejabat?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/pejabat/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        $('#pejabat-table').DataTable().ajax.reload();
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#uppd-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

            // Delete Titik Layanan
            $('body').on('click', '#btn-delete-titik-layanan',function(){
                let data = $(this).data()
                let id = data.id
                console.log(data)
                Swal.fire({
                    title: 'Hapus Data!',
                    text: 'Anda akan menghapus Data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/titik_layanan/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        $('#titik-layanan-table').DataTable().ajax.reload();
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#uppd-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

            
            // Delete Kategori Pegawai
            $('body').on('click', '#btn-delete-hak-akses-menu',function(){
                console.log(89)
                let data = $(this).data()
                let id = data.id
                Swal.fire({
                    title: 'Hapus Data!',
                    text: 'Anda akan menghapus Data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/hak_akses_menu/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        $('#hak-akses-menu-table').DataTable().ajax.reload();
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#uppd-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

            // Delete Kategori Titik Layanan
            $('body').on('click', '#btn-delete-kategori-titik-layanan',function(){
                let data = $(this).data()
                let id = data.id
                Swal.fire({
                    title: 'Hapus Data!',
                    text: 'Anda akan menghapus Data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/kategori_titik_layanan/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        $('#kategori-titik-layanan-table').DataTable().ajax.reload();
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#uppd-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

             // Delete Kategori Pegawai
             $('body').on('click', '#btn-delete-kategori-pegawai',function(){
                console.log(89)
                let data = $(this).data()
                let id = data.id
                Swal.fire({
                    title: 'Hapus Data!',
                    text: 'Anda akan menghapus Data?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/kategori_pegawai/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        $('#kategori-pegawai-table').DataTable().ajax.reload();
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#uppd-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

            // Delete UPPD
            $('body').on('click', '#btn-delete-uppd',function(){
                let data = $(this).data()
                let id = data.id
                Swal.fire({
                    title: 'Hapus UPPD!',
                    text: 'Anda akan menghapus UPPD?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/uppd/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#uppd-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

            // Delete Pegawai
            $('body').on('click', '#btn-delete-pegawai',function(){
                let data = $(this).data()
                let id = data.id
                Swal.fire({
                    title: 'Hapus Pegawai!',
                    text: 'Anda akan menghapus UPPD?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    $.ajax({
                        url: '/pegawai/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            Swal.fire({
                            icon: 'success',
                            title: 'Data berhasil dihapus',
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        },
                        error:function(err){
                            
                        }
                    })
                    
                    $('#pegawai-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
                 

           

            
                
           
            // Delete Level
            $('body').on('click', '#btn-delete-level',function(){
                let data = $(this).data()
                let id = data.id
                console.log(id)
                Swal.fire({
                    title: 'Hapus Level!',
                    text: 'Anda akan menghapus level?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                    console.log('del')
                    console.log(id)
                    $.ajax({
                        url: '/level/delete/'+ id,
                        type: 'DELETE',
                        success:function(res){
                            console.log(res)
                        },
                        error:function(err){
                            console.log(err)
                        }
                    })
                    Swal.fire({
                        icon: 'success',
                        title: 'Data berhasil dihapus',
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    $('#level-table').DataTable().ajax.reload();
                    } else {
                    result.isDenied
                    }
                })
            })

            

           

            $('body').on('click', '#btn-active-user-samsat', function(e){
                e.preventDefault()
                console.log($(this).data())
                let id = $(this).data('id')
                let isActive = $(this).data('isActive')
                if(isActive == 1){
                    Swal.fire({
                    title: 'NON AKTIFKAN USER!',
                    text: 'Anda akan non aktifkan user?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        $.ajax({
                        url:'/is_active/'+id,
                        type: 'PATCH',
                        success:function(res){
                            console.log(res)
                            $('#user-samsat-table').DataTable().ajax.reload();
                            Swal.fire({
                                icon: "success",
                                title: "User berhasil di non aktifkan",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                        })
                        } else {
                        result.isDenied
                        }
                    })
                }else{
                    Swal.fire({
                    title: 'AKTIFKAN USER!',
                    text: 'Anda akan mengaktifkan user?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                    }).then((result) => {
                        if (result.isConfirmed) {
                        $.ajax({
                        url:'/is_active/'+id,
                        type: 'PATCH',
                        success:function(res){
                            console.log(res)
                            $('#user-samsat-table').DataTable().ajax.reload();
                            Swal.fire({
                                icon: "success",
                                title: "User berhasil diaktifkan",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                        })
                        } else {
                        result.isDenied
                        }
                    })
                }
                
                })
            })

        
    </script>
</body>
</html>