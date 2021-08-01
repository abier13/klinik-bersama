            </div>
            </div>
            </div>
            <!-- Menu Toggle Script -->
            <script>
                $(document).ready(function() {
                    $.fn.select2.defaults.set("theme", "bootstrap");

                    // Notifikasi
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function() {
                            $(this).remove();
                        });
                    }, 2000);

                    //Toggle Menu
                    $("#menu-toggle").click(function(e) {
                        e.preventDefault();
                        $("#wrapper").toggleClass("toggled");
                    });

                    //Datatable
                    var t = $('#dataTable').DataTable({
                        "columnDefs": [{
                            "searchable": false,
                            "orderable": false,
                            "targets": 0,
                            "className": "dt-center"
                        }],
                        "order": [
                            [1, 'asc']
                        ]
                    });

                    t.on('order.dt search.dt', function() {
                        t.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = i + 1;
                        });
                    }).draw();

                    //Select Action
                    $("#select_all").on('click', function() {
                        if (this.checked) {
                            $('.check').each(function() {
                                this.checked = true;
                            });
                        } else {
                            $('.check').each(function() {
                                this.checked = false;
                            });
                        }
                    });

                    //OBAT
                    // Hapus Obat
                    $('#hapus_obat').on('click', function() {
                        var konfirmasi = confirm('Anda yakin ingin menghapus data?');
                        if (konfirmasi) {
                            document.proses.action = 'hapus_obat.php';
                            document.proses.submit();
                        }
                    });

                    // Select2 Satuan Obat
                    var placeholder = "Pilih Satuan";
                    var data_satuan_obat = [{
                            id: 'Serbuk',
                            text: 'Serbuk'
                        },
                        {
                            id: 'Gel',
                            text: 'Gel'
                        },
                        {
                            id: 'Tablet',
                            text: 'Tablet'
                        },
                        {
                            id: 'Pil',
                            text: 'Pil'
                        },
                        {
                            id: 'Kapsul',
                            text: 'Kapsul'
                        },
                        {
                            id: 'Kaplet',
                            text: 'Kaplet'
                        },
                        {
                            id: 'Larutan',
                            text: 'Larutan'
                        },
                        {
                            id: 'Suspensi',
                            text: 'Suspensi'
                        },
                        {
                            id: 'Emulsi',
                            text: 'Emulsi'
                        },
                        {
                            id: 'Galenik',
                            text: 'Galenik'
                        },
                        {
                            id: 'Ekstrak',
                            text: 'Ekstrak'
                        },
                        {
                            id: 'Infusa',
                            text: 'Infusa'
                        },
                        {
                            id: 'Krim',
                            text: 'Krim'
                        },
                        {
                            id: 'Salep',
                            text: 'Salep'
                        },
                        {
                            id: 'Losion',
                            text: 'Losion'
                        },
                        {
                            id: 'Obat tetes',
                            text: 'Obat tetes'
                        },
                        {
                            id: 'Injeksi',
                            text: 'Injeksi'
                        }
                    ];
                    $("#single2").select2({
                        placeholder: placeholder,
                        width: null,
                        data: data_satuan_obat,
                        containerCssClass: ':all:'
                    });

                    var placeholder = "Pilih Obat"
                    $(".select2obat").select2({
                        placeholder: placeholder,
                        width: null,
                        containerCssClass: ':all:'
                    });

                    //Dokter
                    // Select2 Satuan Obat
                    var placeholder = "Pilih Spesialis";
                    var data_spesialis = [{
                            id: 'Penyakit Dalam',
                            text: 'Penyakit Dalam'
                        },
                        {
                            id: 'Anak',
                            text: 'Anak'
                        },
                        {
                            id: 'Saraf',
                            text: 'Saraf'
                        },
                        {
                            id: 'Kandungan dan Ginekologi',
                            text: 'Kandungan dan Ginekologi'
                        },
                        {
                            id: 'Bedah',
                            text: 'Bedah'
                        },
                        {
                            id: 'Kulit dan Kelamin',
                            text: 'Kulit dan Kelamin'
                        },
                        {
                            id: 'THT',
                            text: 'THT'
                        },
                        {
                            id: 'Mata',
                            text: 'Mata'
                        },
                        {
                            id: 'Psikiater',
                            text: 'Psikiater'
                        },
                        {
                            id: 'Gigi',
                            text: 'Gigi'
                        }
                    ];
                    $("#single2dokter").select2({
                        placeholder: placeholder,
                        width: null,
                        data: data_spesialis,
                        containerCssClass: ':all:'
                    });

                    var placeholder = "Pilih Dokter"
                    $("#select2dokter").select2({
                        placeholder: placeholder,
                        width: null,
                        containerCssClass: ':all:'
                    });

                    // hapus Dokter
                    $('#hapus_dokter').on('click', function() {
                        var konfirmasi = confirm('Anda yakin ingin menghapus data?');
                        if (konfirmasi) {
                            document.proses.action = 'hapus_dokter.php';
                            document.proses.submit();
                        }
                    });

                    //Pasien
                    //Hapus Pasien
                    $('#hapus_pasien').on('click', function() {
                        var konfirmasi = confirm('Anda yakin ingin menghapus data?');
                        if (konfirmasi) {
                            document.proses.action = 'hapus_pasien.php';
                            document.proses.submit();
                        }
                    });

                    var placeholder = "Pilih Pasien"
                    $("#select2pasien").select2({
                        placeholder: placeholder,
                        width: null,
                        containerCssClass: ':all:'
                    });

                    //Poliklinik
                    //Hapus Poliklinik
                    $('#hapus_poliklinik').on('click', function() {
                        var konfirmasi = confirm('Anda yakin ingin menghapus data?');
                        if (konfirmasi) {
                            document.proses.action = 'hapus_poliklinik.php';
                            document.proses.submit();
                        }
                    });

                    // Pilih Nama Poli
                    var placeholder = "Pilih Nama Poliklinik"
                    $("#single2poli").select2({
                        placeholder: placeholder,
                        width: null,
                        data: data_spesialis,
                        containerCssClass: ':all:'
                    });

                    var placeholder = "Pilih Poliklinik"
                    $("#select2poli").select2({
                        placeholder: placeholder,
                        width: null,
                        containerCssClass: ':all:'
                    });

                    //user
                    //Hapus user
                    $('#hapus_user').on('click', function() {
                        var konfirmasi = confirm('Anda yakin ingin menghapus data?');
                        if (konfirmasi) {
                            document.proses.action = 'hapus_user.php';
                            document.proses.submit();
                        }
                    });

                    //Rekam Medis
                    //Hapus rekam medis
                    $('#hapus_rm').on('click', function() {
                        var konfirmasi = confirm('Anda yakin ingin menghapus data?');
                        if (konfirmasi) {
                            document.proses.action = 'hapus_rm.php';
                            document.proses.submit();
                        }
                    });
                });
            </script>
            </body>

            </html>