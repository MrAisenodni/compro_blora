<?php

namespace App\Services;

use App\Helpers\AppHelper;
use App\Repositories\Managements\ContactInfo\ContactInfoRepositoryInterface;
use App\Repositories\Managements\Service\ServiceRepositoryInterface;
use App\Repositories\Managements\ServiceDetail\ServiceDetailRepositoryInterface;
use App\Repositories\Managements\Slider\SliderRepositoryInterface;
use App\Repositories\Masters\Doctor\DoctorRepositoryInterface;
use App\Repositories\Settings\Menu\MenuRepositoryInterface;
use App\Repositories\Settings\Provider\ProviderRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class HomeService
{
    public function __construct(
        SliderRepositoryInterface $sliderRepository, MenuRepositoryInterface $menuRepository, 
        ContactInfoRepositoryInterface $contactInfoRepository, ServiceRepositoryInterface $serviceRepository,
        ProviderRepositoryInterface $providerRepository, DoctorRepositoryInterface $doctorRepository
    )
    {
        $this->contactInfoRepository    = $contactInfoRepository;
        $this->doctorRepository         = $doctorRepository;
        $this->serviceRepository        = $serviceRepository;
        $this->sliderRepository         = $sliderRepository;
        $this->menuRepository           = $menuRepository;
        $this->menuRepository           = $menuRepository;
        $this->providerRepository       = $providerRepository;
    }

    public function index()
    {
        $menu = $this->menuRepository->findBySlug('');

        $data = [
            'provider'          => $this->providerRepository->findData(),
            'sliders'           => $this->sliderRepository->getByCondition("id, title, subtitle, slug, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("id, title, subtitle, slug, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'services'          => $this->serviceRepository->getByCondition("id, title, subtitle, slug, description, icon, picture", "menu_id = $menu->id", "order_no ASC"), 
            'c_menu'            => $menu,
        ];

        return $data;
    }

    public function page($slug)
    {
        $menu = $this->menuRepository->findBySlug($slug);

        $data = [
            'provider'          => $this->providerRepository->findData(),
            'sliders'           => $this->sliderRepository->getByCondition("id, title, subtitle, slug, description, picture", "menu_id = $menu->id", "order_no ASC"), 
            'contact_infos'     => $this->contactInfoRepository->getByCondition("id, title, subtitle, slug, description, icon", "menu_id = $menu->id", "order_no ASC"), 
            'services'          => $this->serviceRepository->getByCondition("id, title, subtitle, slug, description, icon, picture", "menu_id = $menu->id", "order_no ASC"), 
            'c_menu'            => $menu,
        ];

        return $data;
    }

    public function doctor($code)
    {
        $menu = $this->menuRepository->findBySlug('jadwal-dokter');

        $data = [
            'provider'          => $this->providerRepository->findData(),
            'c_menu'            => $menu,
            'doctor'            => $this->doctorRepository->findByCode($code),
        ];

        return $data;
    }

    public function store($request, $slug)
    {
        if ($request->new_patient == 1)
        {
            $validated = $request->validate([
                'new_nik'               => 'required|min:16|max:16',
                'full_name'             => 'required|min:3',
                'gender'                => 'required',
                'birth_place'           => 'required',
                'phone_no'              => 'required',
                'address'               => 'required',
                'new_birth_date'        => 'required',
                'new_doctor'            => 'required',
                'new_schedule'          => 'required',
                'new_assurance'         => 'required',
                'new_registration_date' => 'required|after_or_equal:'.date('Y-m-d', strtotime(now())),
                'new_poli'              => 'required',
            ]);

            // Deklarasi Variabel Gabungan
            $nik                = $request->new_nik;
            $birth_date         = $request->new_birth_date;
            $doctor             = $request->new_doctor;
            $poli               = $request->new_poli;
            $assurance          = $request->new_assurance;

            // Validate registration_date must be less than 7 days
            $registrationDateTime   = $request->new_registration_date.' '.$request->new_schedule;
            $registrationTimestamp  = strtotime($registrationDateTime);
            $currentTimestamp       = time();
            $error                  = null;
            
            // Menghitung 7 hari yang akan datang
            $sevenDaysAgoTimestamp = strtotime('7 days', $currentTimestamp);

            // Validasi Tanggal Registrasi tidak boleh lebih dari 7 hari
            if ($registrationTimestamp > $sevenDaysAgoTimestamp) {
                $error['new_registration_date'] = 'Tanggal Registrasi tidak boleh lebih dari 7 hari.';
            }

            // Menghitung 5 jam 
            $fiveHoursAgoTimestamp = strtotime('5 hours', $currentTimestamp);

            // Validasi Tanggal Registrasi yang sama tidak boleh lebih dari 5 jam
            if ($registrationTimestamp < $fiveHoursAgoTimestamp) {
                $error['new_schedule'] = 'Jadwal Dokter tidak boleh kurang dari 5 jam di tanggal yang sama.';
            }

            // Validasi Tanggal Registrasi tidak boleh kurang dari jam saat ini
            if ($registrationTimestamp < $currentTimestamp)
            {
                $error['new_schedule'] = 'Jadwal Dokter tidak boleh kurang dari jam saat ini.';
            }

            if ($error) return back()->withErrors($error)->withInput();

            // Deklarasi Request ke API
            $data = [
                'patient_name'  => $request->full_name,
                'bpjs_no'       => $request->new_bpjs_no,
                'address'       => $request->address,
                'birth_date'    => $request->birth_date,
                'birth_place'   => $request->birth_place,
                'phone_no'      => $request->phone_no,
                'email'         => $request->email,
                'gender'        => $request->gender,
                'new_patient'   => (int) $request->new_patient,
            ];
        }
        else 
        {
            $validated = $request->validate([
                'mr_no'                 => 'required',
                // 'old_nik'               => 'required|min:16|max:16',
                // 'old_birth_date'        => 'required',
                'old_doctor'            => 'required',
                'old_schedule'          => 'required',
                'old_assurance'         => 'required',
                'old_registration_date' => 'required|after_or_equal:'.date('Y-m-d', strtotime(now())),
                'old_poli'              => 'required',
            ]);

            // Deklarasi Variabel Gabungan
            $nik                = $request->old_nik;
            $birth_date         = $request->old_birth_date;
            $doctor             = $request->old_doctor;
            $poli               = $request->old_poli;
            $assurance          = $request->old_assurance;

            // Validate registration_date must be less than 7 days
            $registrationDateTime   = $request->old_registration_date.' '.$request->old_schedule;
            $registrationTimestamp  = strtotime($registrationDateTime);
            $currentTimestamp       = time();
            $error                  = null;
            
            // Menghitung 7 hari yang akan datang
            $sevenDaysAgoTimestamp = strtotime('7 days', $currentTimestamp);

            // Validasi Tanggal Registrasi tidak boleh lebih dari 7 hari
            if ($registrationTimestamp > $sevenDaysAgoTimestamp) {
                $error['old_registration_date'] = 'Tanggal Registrasi tidak boleh lebih dari 7 hari.';
            }

            // Menghitung 5 jam 
            $fiveHoursAgoTimestamp = strtotime('5 hours', $currentTimestamp);

            // Validasi Tanggal Registrasi yang sama tidak boleh lebih dari 5 jam
            if ($registrationTimestamp < $fiveHoursAgoTimestamp) {
                $error['old_schedule'] = 'Jadwal Dokter tidak boleh kurang dari 5 jam di tanggal yang sama.';
            }

            // Validasi Tanggal Registrasi tidak boleh kurang dari jam saat ini
            if ($registrationTimestamp < $currentTimestamp)
            {
                $error['old_schedule'] = 'Jadwal Dokter tidak boleh kurang dari jam saat ini.';
            }

            if ($error) return back()->withErrors($error)->withInput();

            // Deklarasi Request ke API
            $data = [
                'mr_no'         => $request->mr_no,
                'full_name'     => $request->old_full_name,
                'bpjs_no'       => $request->old_bpjs_no,
                'new_patient'   => (int) $request->new_patient,
            ];
        }

        $data += [
            'nik'                   => $nik,
            'birth_date'            => $birth_date,
            'doctor_code'           => $doctor,
            'poli_code'             => $poli,
            'assurance_code'        => $assurance,
            'registration_date'     => (string) date('Y-m-d H:i:s', strtotime($registrationDateTime)),
        ];
        $response = AppHelper::api(env('API_URL').'book_schedule', 'POST', 'application/json', json_encode($data));

        // Cek kondisi response ketika ada error
        if (json_decode($response)->response->error)
        {
            return back()->with('error', json_decode($response)->response->error)->withErrors(json_decode($response)->response->error)->withInput();
        }

        return back()->with('status', json_decode($response)->response->title)->with('data', json_decode($response)->response->data);
    }

    public function sitemap()
    {
        $sitemap = Sitemap::create(env('APP_URL_PRODUCTION'))
            ->add(Url::create('/')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)->setPriority(1.0))
            ->add(Url::create('/jadwal-dokter')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/fasilitas-pelayanan')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/tentang')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->add(Url::create('/kontak')->setLastModificationDate(now())->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)->setPriority(0.8))
            ->writeToFile(public_path('sitemap.xml'));

        return $sitemap->render();
    }

    public function generatePdf($request)
    {
        // Data yang akan dikirim ke view PDF
        $pdfData = [
            'title'     => 'RS PKU MUHAMMADIYAH BLORA<br>Jl. Raya Blora Km 3 Jepon - Seso<br>Telp. (0296) 532 257 / 525 634', 
            'data'      => $request,
        ];

        // Ukuran kertas dalam inci (16 cm x 20 cm)
        $width  = 16 * 28.3465;  // 16 cm to points
        $height = 20 * 28.3465; // 20 cm to points

        // Buat PDF dengan ukuran kertas kustom dan orientasi portrait
        $pdf = Pdf::loadView('print', $pdfData)->setPaper([0, 0, $width, $height], 'portrait');

        // Mengirim PDF langsung ke browser
        return $pdf->stream($request->registration_no.'_'.$request->mr_no.'.pdf');
    }
}