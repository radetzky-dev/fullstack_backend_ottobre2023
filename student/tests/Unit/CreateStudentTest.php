<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\Models\Student;
use \App\Models\Professor;

class CreateStudentTest extends TestCase
{
    public function test_create_new_student()
    {

        $student = Student::factory()->create();
        var_dump($student['name']);
        $this->assertModelExists($student);
        $student->delete();
        $this->assertModelMissing($student);

    }

    public function test_create_new_professor()
    {

        $professor = Student::factory()->create();
        var_dump($professor['Name']);
        $this->assertModelExists($professor);
        $professor->delete();
        $this->assertModelMissing($professor);

    }
}
