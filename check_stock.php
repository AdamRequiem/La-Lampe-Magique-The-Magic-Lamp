<?php
if (isset($_GET['id'])) {
  $productId = intval($_GET['id']);
  try {
    $Con = new PDO("mysql:host=localhost;dbname=lalampemagique;charset=utf8", "root", "");
    $Con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT STOCK FROM PRODUIT WHERE ID_PRODUIT = :id";
    $stmt = $Con->prepare($sql);
    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      echo json_encode(['stock' => $row['STOCK']]);
    } else {
      echo json_encode(['stock' => 0]);
    }
  } catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
  }
  $Con = null;
} else {
  echo json_encode(['error' => 'Invalid product ID']);
}
?>
