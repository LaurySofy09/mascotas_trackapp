<?php
// Configuración de la base de datos
$hostname = 'localhost';
$username = 'root';
$password = '35t4311a';
$database = 'mascotasproject';

// Ruta donde se guardarán los respaldos
$backupDir = 'C:\xampp\phpMyAdmin\mysql';

// Nombre del archivo de respaldo
$backupFile = $backupDir . $database . '_' . date('Y-m-d_H-i-s') . '.sql';

// Comando mysqldump para crear el respaldo
$command = "mysqldump -h $hostname -u $username -p$password $database > $backupFile";

// Ejecuta el comando para crear el respaldo
exec($command, $output, $returnVar);

if ($returnVar === 0) {
    echo 'Respaldo creado con éxito en ' . $backupFile;
} else {
    echo 'Error al crear el respaldo: ' . implode("\n", $output);
}
?>
