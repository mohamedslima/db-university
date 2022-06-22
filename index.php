<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/department.php";

$sql = "SELECT `id`, `name` FROM `departments`;";
$result = $conn->query($sql);
$departments = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $curr_department = new Department($row["id"], $row["name"]);
    $departments[] = $curr_department;
  }
} elseif ($result) {
  echo "No matches.";
} else {
  echo "Error in the request.";
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dipartimenti</title>
</head>

<body>
  <h1>DIpartimenti</h1>

  <?php foreach ($departments as $department) { ?>
    <div>
      <h2><?php echo $department->name; ?></h2>
      <a href="info-department.php?id=<?php echo $department->id; ?>">Clicca qui per maggiori informazioni</a>
    </div>
  <?php }
  ?>
</body>
</html>