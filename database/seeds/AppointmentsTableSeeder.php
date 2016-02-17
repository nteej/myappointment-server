<?php

use Illuminate\Database\Seeder;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Src\Appointment\Appointment::class,25)->make()->each(function($appointment){
            $company = App\Src\Company\Company::orderByRaw("RAND()")->first();
            $service = App\Src\Service\Service::orderByRaw("RAND()")->first();
            $employee = App\Src\Employee\Employee::orderByRaw("RAND()")->first();
            $timing = App\Src\Timing\Timing::orderByRaw("RAND()")->first();
            $user = App\Src\User\User::orderByRaw("RAND()")->first();
            $appointment->company_id = $company->id;
            $appointment->service_id = $service->id;
            $appointment->employee_id = $employee->id;
            $appointment->timing_id = $timing->id;
            $appointment->user_id = $user->id;
            $appointment->save();
        });
    }
}
