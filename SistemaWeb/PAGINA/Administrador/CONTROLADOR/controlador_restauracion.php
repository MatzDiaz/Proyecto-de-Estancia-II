<?php
/*
if (pathinfo($archivo["name"], PATHINFO_EXTENSION) == "sql") {
    if ($archivo["type"] == "application/sql") {
        $ruta_temporal = sys_get_temp_dir() . '/' . $archivo_sql["name"];
 
        
        move_uploaded_file($archivo["tmp_name"], $ruta_temporal);

        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'sistemaweb';

        // Comando para restaurar la base de datos
        $comando = "mysql -h {$hostname} -u {$username} -p{$password} {$database} < {$ruta_temporal}";

        // Ejecutar el comando
        $resultado = system($comando, $retorno);

        echo "Restauración exitosa.";
    } else {
        echo "Error: El archivo seleccionado no es un archivo SQL válido.";

    }
} else {
    echo "Error: El archivo seleccionado no es un archivo SQL válido.";
}*/
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'sistemaweb';
$filePath   = '../../DOWNLOADS/respaldosql';

function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath){
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}

?>
