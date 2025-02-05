<?php
$data = json_decode(file_get_contents("php://input"), true);
$action = $data["action"];

$original = "/storage/emulated/0/DARKSIDE/global-metadata.dat";
$backup = "/storage/emulated/0/DARKSIDE/global-metadata_backup.dat";
$destination = "/storage/emulated/0/ALBSTB/global-metadata.dat";

if ($action === "on") {
    if (file_exists($original)) {
        copy($original, $backup); // Backup le raha hai
        if (rename($original, $destination)) {
            echo "File moved to ALBSTB successfully!";
        } else {
            echo "Error moving file!";
        }
    } else {
        echo "File not found in DARKSIDE!";
    }
} elseif ($action === "off") {
    if (file_exists($backup)) {
        rename($backup, $original); // Backup wapas la raha hai
        echo "File restored to DARKSIDE!";
    } else {
        echo "Backup file not found!";
    }
} else {
    echo "Invalid action!";
}
?>
