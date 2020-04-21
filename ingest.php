<?php
    if(isset($_SERVER["HTTP_WAREHOUSE_KEY"]) == 0){
        die("NO WAREHOUSE_KEY HEADER.");
    }
    $file_name = $_SERVER["HTTP_WAREHOUSE_KEY"];
    $file = "$file_name.csv";
    file_put_contents($file, file_get_contents('php://input')."\n", FILE_APPEND);
?>
<script>
    const WAREHOUSE_KEY = "KEY";
    const WAREHOUSE_ENDPOINT = "URL";
    const pushRawData = async (data, warehouse_key) => {
        const currentKey = WAREHOUSE_KEY || warehouse_key;
        try {
            axios({
                method: "post",
                url: `${WAREHOUSE_ENDPOINT}/ingest.php`,
                headers: {
                    WAREHOUSE_KEY: currentKey,
                },
                data: data
                    .map((c) => c && typeof c === "string" && c.replace(",", "\n"))
                    .join(","),
            });
        } catch (e) {
            console.log(e);
        }
    };

</script>