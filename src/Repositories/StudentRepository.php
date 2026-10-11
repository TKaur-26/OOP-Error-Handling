
<?php

require_once __DIR__ . '/../Models/Student.php';
require_once __DIR__ . '/../Exceptions/StudentNotFoundException.php';

class StudentRepository
{
    private array $students = [];

    public function add(Student $student): void
    {
        $id = $student->getId();

        if (isset($this->students[$id])) {
            throw new Exception("Student ID already exists.");
        }

        $this->students[$id] = $student;
    }

    public function getAll(): array
    {
        return array_values($this->students);
    }

    public function findById(int $id): Student
    {
        if (!isset($this->students[$id])) {
            throw new StudentNotFoundException(
                "Student with ID $id not found."
            );
        }

        return $this->students[$id];
    }

    public function deleteById(int $id): void
    {
        $this->findById($id);
        unset($this->students[$id]);
    }
}
