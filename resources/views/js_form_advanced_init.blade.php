<script>
    // Hari dalam Seminggu
    function getDayInteger(day) {
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']

        return days.indexOf(day)
    }

    // Mengambil data Poli berdasarkan Hari
    function fetchPoliData(day) {
        const dayInteger = getDayInteger(day) + 1;
        const url = `/proxy/poli/${dayInteger}`;
        // const url = `{!! env('API_URL') !!}poli/${dayInteger}`
        const token = `{!! env('X_TOKEN') !!}`

        return $.ajax({
            url: url,
            dataType: 'json',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('x-token', token)
            }
        })
    }

    // Mengambil data Dokter berdasarkan Hari dan Poli
    function fetchDoctorData(day, poli) {
        const dayInteger = getDayInteger(day) + 1
        const poliCode = poli
        const url = `/proxy/doctor/${dayInteger}/${poliCode}`;
        // const url = `{!! env('API_URL') !!}doctor/${dayInteger}/${poliCode}`
        const token = `{!! env('X_TOKEN') !!}`

        return $.ajax({
            url: url,
            dataType: 'json',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('x-token', token)
            }
        })
    }

    // Mengambil data Jadwal Dokter berdasarkan Hari, Poli, dan Dokter
    function fetchDoctorScheduleData(day, poli, doctor) {
        const dayInteger = getDayInteger(day) + 1
        const poliCode = poli
        const doctorCode = doctor
        const url = `/proxy/doctor_schedule/${dayInteger}/${poliCode}/${doctorCode}`;
        // const url         = `{!! env('API_URL') !!}doctor_schedule/${dayInteger}/${poliCode}/${doctorCode}`
        const token = `{!! env('X_TOKEN') !!}`

        return $.ajax({
            url: url,
            dataType: 'json',
            method: 'GET',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('x-token', token)
            }
        })
    }

    // Bagian untuk Pendaftaran Pasien Lama
    $(document).ready(function() {
        // Fungsi untuk mencari Pasien
        $('#mr_no').change(function() {
            var term = $(this).val()
            if (term.length >= 1) {
                $.ajax({
                    url: `/proxy/patient/` + term,
                    // url: `{!! env('API_URL') !!}patient/` + term,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('x-token', `{!! env('X_TOKEN') !!}`)
                    },
                    success: function(data) {
                        var data = data.response.data
                        console.log(data)
                        var formattedDate = data.birth_date.split(' ')[
                        0]; // Memotong bagian waktu dari tanggal

                        $('#old_bpjs_no').val(data.bpjs_no);
                        $('#old_full_name').val(data.full_name).removeClass('text-danger');
                        $('#old_nik').val(data.nik).removeClass('text-danger');
                        $('#old_birth_date').val(formattedDate);
                    },
                    error: function(data) {
                        var data = data.responseJSON.response.error[0]
                        console.log(data)

                        $('#old_full_name').val(data.title).addClass('text-danger');
                        $('#old_nik').val(data.title).addClass('text-danger');
                    }
                })
            }
        })

        $('#old_registration_date').change(function() {
            const selectedDate = new Date($(this).val());
            const dayOfWeek = selectedDate.toLocaleString('en-us', {
                weekday: 'long'
            })

            // Ambil data Poli dari API
            fetchPoliData(dayOfWeek).done(function(data) {
                const poliOptions = data.response.data.map(function(item) {
                    return {
                        id: item.code,
                        text: item.name
                    }
                })

                // Tampilkan data Poli di select2
                $('#old_poli').empty().select2({
                    data: poliOptions,
                    placeholder: '=== Pilih Poli ===',
                    allowClear: true
                }).val(null).trigger('change').prop('disabled', false)

                $('#old_doctor').empty().val('').prop('disabled', true)
                $('#old_schedule').empty().val('').prop('disabled', true)
            })
        })

        $('#old_poli').change(function() {
            const selectedDate = new Date($('#old_registration_date').val());
            const dayOfWeek = selectedDate.toLocaleString('en-us', {
                weekday: 'long'
            })
            const selectedPoli = $(this).val()

            // Ambil data Dokter dari API
            if (selectedPoli) 
            {
                fetchDoctorData(dayOfWeek, selectedPoli).done(function(data) {
                    const doctorOptions = data.response.data.map(function(item) {
                        return {
                            id: item.code,
                            text: item.name
                        }
                    })
    
                    // Tampilkan data Dokter di select2
                    $('#old_doctor').empty().select2({
                        data: doctorOptions,
                        placeholder: '=== Pilih Dokter ===',
                        allowClear: true
                    }).val(null).trigger('change').prop('disabled', false)
    
                    $('#old_schedule').empty().prop('disabled', true) // Reset Pilihan Jadwal Dokter
                })
            }
        })

        $('#old_doctor').change(function() {
            const selectedDate = new Date($('#old_registration_date').val());
            const dayOfWeek = selectedDate.toLocaleString('en-us', {
                weekday: 'long'
            })
            const selectedPoli = $('#old_poli').val()
            const selectedDoctor = $(this).val()

            // Ambil data Jadwal Dokter dari API
            if (selectedDoctor)
            {
                fetchDoctorScheduleData(dayOfWeek, selectedPoli, selectedDoctor).done(function(data) {
                    const doctorOptions = data.response.data.map(function(item) {
                        const timeParts = item.start_time.split(':')
                        const formattedTime = `${timeParts[0]}:${timeParts[1]}`
    
                        return {
                            id: item.start_time,
                            text: formattedTime
                        }
                    })
    
                    // Tampilkan data Jadwal Dokter di select2
                    $('#old_schedule').empty().select2({
                        data: doctorOptions,
                        placeholder: '=== Pilih Jadwal Dokter ===',
                        allowClear: true
                    }).val(null).trigger('change').prop('disabled', false)
                })
            }
        })
    })

    // Bagian untuk Pendaftaran Pasien Baru
    $(document).ready(function() {
        $('#new_registration_date').change(function() {
            const selectedDate = new Date($(this).val());
            const dayOfWeek = selectedDate.toLocaleString('en-us', {
                weekday: 'long'
            })

            // Ambil data Poli dari API
            fetchPoliData(dayOfWeek).done(function(data) {
                const poliOptions = data.response.data.map(function(item) {
                    return {
                        id: item.code,
                        text: item.name
                    }
                })

                // Tampilkan data Poli di select2
                $('#new_poli').empty().select2({
                    data: poliOptions,
                    placeholder: '=== Pilih Poli ===',
                    allowClear: true
                }).val(null).trigger('change').prop('disabled', false)

                $('#new_doctor').empty().val('').prop('disabled', true)
                $('#new_schedule').empty().val('').prop('disabled', true)
            })
        })

        $('#new_poli').change(function() {
            const selectedDate = new Date($('#new_registration_date').val());
            const dayOfWeek = selectedDate.toLocaleString('en-us', {
                weekday: 'long'
            })
            const selectedPoli = $(this).val()

            // Ambil data Dokter dari API
            if (selectedPoli) 
            {
                fetchDoctorData(dayOfWeek, selectedPoli).done(function(data) {
                    const doctorOptions = data.response.data.map(function(item) {
                        return {
                            id: item.code,
                            text: item.name
                        }
                    })
    
                    // Tampilkan data Dokter di select2
                    $('#new_doctor').empty().select2({
                        data: doctorOptions,
                        placeholder: '=== Pilih Dokter ===',
                        allowClear: true
                    }).val(null).trigger('change').prop('disabled', false)
    
                    $('#new_schedule').empty().prop('disabled', true)
                })
            }
        })

        $('#new_doctor').change(function() {
            const selectedDate = new Date($('#new_registration_date').val());
            const dayOfWeek = selectedDate.toLocaleString('en-us', {
                weekday: 'long'
            })
            const selectedPoli = $('#new_poli').val()
            const selectedDoctor = $(this).val()

            // Ambil data Jadwal Dokter dari API
            if (selectedDoctor)
            {
                fetchDoctorScheduleData(dayOfWeek, selectedPoli, selectedDoctor).done(function(data) {
                    const doctorOptions = data.response.data.map(function(item) {
                        const timeParts = item.start_time.split(':')
                        const formattedTime = `${timeParts[0]}:${timeParts[1]}`
    
                        return {
                            id: item.start_time,
                            text: formattedTime
                        }
                    })
    
                    // Tampilkan data Jadwal Dokter di select2
                    $('#new_schedule').empty().select2({
                        data: doctorOptions,
                        placeholder: '=== Pilih Jadwal Dokter ===',
                        allowClear: true
                    }).val(null).trigger('change').prop('disabled', false)
                })
            }
        })
    })

    // Inputan Tanggal Registrasi hanya bisa dipilih hari ini s/d 7 hari ke depan
    document.addEventListener('DOMContentLoaded', () => {
        const newDateInput = document.getElementById('new_registration_date');
        const oldDateInput = document.getElementById('old_registration_date');
        const today = new Date();
        const maxDate = new Date();

        // Set the maxDate to 7 days from today
        maxDate.setDate(today.getDate() + 7);

        // Format the dates to yyyy-mm-dd
        const formatDate = (date) => {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };

        newDateInput.min = formatDate(today);
        newDateInput.max = formatDate(maxDate);
        oldDateInput.min = formatDate(today);
        oldDateInput.max = formatDate(maxDate);
    });
</script>
