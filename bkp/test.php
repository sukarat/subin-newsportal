<!DOCTYPE html>
<html>
<head>
    <title>Weighted Sum Scoring</title>
</head>
<body>
    <h1>Applicant Ranking</h1>

    <?php
    // Define the criteria and their weights
    $criteria = [
        "Experience" => 0.4,
        "Education" => 0.3,
        "Interview Performance" => 0.3,
    ];

    // Define a list of applicants with their scores for each criterion
    $applicants = [
        [
            "name" => "Applicant A",
            "Experience" => 16,
            "Education" => 9,
            "Interview Performance" => 7,
        ],
        [
            "name" => "Applicant B",
            "Experience" => 7,
            "Education" => 8,
            "Interview Performance" => 9,
        ],
        // Add more applicants as needed
    ];

    // Calculate the scores for each applicant
    foreach ($applicants as &$applicant) {
        $finalScore = 0;
        foreach ($criteria as $criterion => $weight) {
            $rawScore = $applicant[$criterion];
            $finalScore += $weight * $rawScore;
        }
        $applicant["Final Score"] = $finalScore;
    }

    // Sort the applicants by their final scores in descending order (highest score first)
    usort($applicants, function ($a, $b) {
        return $b["Final Score"] - $a["Final Score"];
    });
    ?>

    <h2>Ranked Applicants:</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Final Score</th>
        </tr>
        <?php foreach ($applicants as $applicant) : ?>
            <tr>
                <td><?= $applicant["name"] ?></td>
                <td><?= $applicant["Final Score"] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
