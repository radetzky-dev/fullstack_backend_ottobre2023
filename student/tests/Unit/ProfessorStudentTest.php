<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\Models\Student;
use \App\Models\Professor;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\StudentController;

class ProfessorStudentTest extends TestCase
{

    public function test_rotte()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->post(
            'prof/store',
            [
                'Name' => 'Test User',
                'Subject' => 'materia',
            ]
        );
        $response->assertStatus(302);
        $response->assertRedirect('showprofessore');

        $response = $this->post(
            'students',
            [
                'name' => 'Test Mario',
                'email' => 'materia@test.it',
                'phone' => '2222',
                'password' => 'materia',
            ]
        );
        $response->assertStatus(302);
        $response->assertRedirect('students');

    }

    public function test_create_new_student()
    {

        $student = Student::factory()->create();
        //var_dump($student['name']);
        $this->assertModelExists($student);
        $student->delete();
        $this->assertModelMissing($student);

    }

    public function test_create_new_professor()
    {

        $professor = Professor::factory()->create();
        // var_dump($professor['Name']);
        $this->assertModelExists($professor);
        $professor->delete();
        $this->assertModelMissing($professor);

    }

    public function test_get_mail_student()
    {
        $student = Student::factory()->create();
        $mail = $student['email'];
        //echo "Mail $mail";

        $response = $this->get(
            '/mostramail/' . $student['name']
        );

        $response->assertContent($mail);
        $student->delete();
        $this->assertModelMissing($student);

        $response = $this->get(
            '/mostramail/nonesiste'
        );
        $response->assertContent("");

    }



}
