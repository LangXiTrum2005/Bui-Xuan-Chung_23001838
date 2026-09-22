function findBestStudent($students) {
    $best = $students[0];

    foreach ($students as $student) {
        if ($student["score"] > $best["score"]) {
            $best = $student;
        }
    }

    return $best;
}

function findWorstStudent($students) {
    $worst = $students[0];

    foreach ($students as $student) {
        if ($student["score"] < $worst["score"]) {
            $worst = $student;
        }
    }

    return $worst;
}

function countPassedStudents($students) {
    $count = 0;

    foreach ($students as $student) {
        if ($student["score"] >= 5) {
            $count++;
        }
    }

    return $count;
}

function findStudentByName($students, $name) {
    foreach ($students as $student) {
        if ($student["name"] == $name) {
            return $student;
        }
    }

    return null;
}