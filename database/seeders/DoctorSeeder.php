<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Appointment;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // \App\Models\Doctor::factory()->count(30)->create();
        $doctors =  Doctor::factory()->count(30)->create();
        

        foreach ($doctors as $doctor){
            $Appointment = Appointment::all()->random()->id;
            $doctor->doctorappointments()->attach($Appointment);
        }
//
//        Doctor::all()->each(function ($doctor) use ($Appointments) {
//            $doctor->doctorappointments()->attach(
//                $Appointments->random(rand(1,7))->pluck('id')->toArray()
//            );
//        });
    }
}
