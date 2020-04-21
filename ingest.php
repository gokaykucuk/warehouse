<?php
    if(isset($_SERVER["HTTP_WAREHOUSE_KEY"]) == 0){
        die("NO WAREHOUSE_KEY HEADER.");
    }
    $file_name = $_SERVER["HTTP_WAREHOUSE_KEY"];
    $file = "$file_name.csv";
    file_put_contents($file, file_get_contents('php://input')."\n", FILE_APPEND);
?>
<script>
    const WAREHOUSE_ENDPOINT = "localhost:8000"
    const pushRawData = (warehouse_key, data) => {
        fetch("/ingest.php",{
            method: "POST",
            headers: {
                WAREHOUSE_KEY: warehouse_key
            },
            body: data.toString()
        });
    };
</script>