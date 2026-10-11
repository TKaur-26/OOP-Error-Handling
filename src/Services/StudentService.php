
<?php

require_once __DIR__ . '/../Models/Student.php';
require_once __DIR__ . '/../Repositories/StudentRepository.php';

class StudentService
{
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function addStudent(Student $student): void
    {
        $this->repository->add($student);
    }

    public function getAllStudents(): array
    {
        return $this->repository->getAll();
    }

    public function findStudent(int $id): Student
    {
        return $this->repository->findById($id);
    }

    public function deleteStudent(int $id): void
    {
        $this->repository->deleteById($id);
    }
}
