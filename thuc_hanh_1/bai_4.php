<?php

class Student
{
    public $name;
    public $age;
    public $score;


    public function __construct($name, $age, $score) {
        $this->name = $name;
        $this->age = $age;
        $this->score = $score;
    }
    public function getRank()
    {
        if ($this->score >= 8)
            return "Giỏi";
        elseif ($this->score >= 6.5)
            return "Khá";
        elseif ($this->score >= 5)
            return "Trung bình";
        else
            return "Yếu";
    }
    public function isPassed()
    {
        return $this->score >= 5;
    }
    public function display()
    {
        echo "- Họ tên: " . $this->name
            . " | Tuổi: " . $this->age
            . " | Điểm: " . $this->score
            . " | Xếp loại: " . $this->getRank() . "<br>";
    }
}

class StudentManager
{
    private $students = [];

    public function __construct($students)
    {
        $this->students = $students;
    }

    public function displayAll()
    {
        foreach ($this->students as $student) {
            $student->display();
        }
    }

    public function getBestStudent()
    {
        if (empty($this->students))
            return null;

        $best = $this->students[0];
        foreach ($this->students as $student) {
            if ($student->score > $best->score) {
                $best = $student;
            }
        }
        return $best;
    }

    public function countPassedStudents()
    {
        $count = 0;
        foreach ($this->students as $student) {
            if ($student->isPassed()) {
                $count++;
            }
        }
        return $count;
    }

    public function calculateAverageScore()
    {
        if (empty($this->students))
            return 0;

        $totalScore = 0;
        foreach ($this->students as $student) {
            $totalScore += $student->score;
        }
        return $totalScore / count($this->students);
    }
}

$student1 = new Student("Nguyen Van An", 20, 8.5);
$student2 = new Student("Tran Thi Binh", 21, 6.5);
$student3 = new Student("Le Van Cuong", 19, 4.5);
$student4 = new Student("Pham Thi Dung", 20, 7.5);

$listStudents = [$student1, $student2, $student3, $student4];

$manager = new StudentManager($listStudents);

echo "<h3>Danh sách thông tin sinh viên:</h3>";
$manager->displayAll();

echo "<hr>";

$bestStudent = $manager->getBestStudent();
echo "<b>Sinh viên có điểm cao nhất:</b><br>";
if ($bestStudent != null) {
    $bestStudent->display();
}

$passedCount = $manager->countPassedStudents();
echo "<br><b>Số sinh viên đạt (Điểm >= 5):</b> " . $passedCount . " sinh viên<br>";

$average = $manager->calculateAverageScore();
echo "<br><b>Điểm trung bình của lớp:</b> " . $average . "<br>";
?>