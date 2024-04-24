<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Data Table</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Data Nilai Mahasiswa</h2>
        <hr>
        <a href='insertNilaiView.php' class='btn btn-primary btn-sm mb-3'>Tambah Nilai</a>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th>SKS</th>
                        <th>ID Perkuliahan</th>
                        <th>Nilai</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="jsonData">
                    <?php
                    // URL of the endpoint
                    $url = "http://localhost/sait_uts/server.php";

                    // Initialize cURL session
                    $curl = curl_init();

                    // Set cURL options
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    // Execute cURL session
                    $response = curl_exec($curl);

                    // Close cURL session
                    curl_close($curl);

                    // Check if data is received successfully
                    if ($response) {
                        // Decode JSON data
                        $jsonData = json_decode($response, true);

                        // Check if JSON data is valid
                        if ($jsonData) {
                            // Loop through JSON data and display in table rows
                            foreach ($jsonData as $item) {
                                echo "<tr>";
                                echo "<td>" . $item['nim'] . "</td>";
                                echo "<td>" . $item['nama'] . "</td>";
                                echo "<td>" . $item['alamat'] . "</td>";
                                echo "<td>" . $item['tanggal_lahir'] . "</td>";
                                echo "<td>" . $item['kode_mk'] . "</td>";
                                echo "<td>" . $item['nama_mk'] . "</td>";
                                echo "<td>" . $item['sks'] . "</td>";
                                echo "<td>" . $item['id_perkuliahan'] . "</td>";
                                echo "<td>" . $item['nilai'] . "</td>";
                                echo "<td>";
                                echo "<a href='deleteNilaiDo.php?nim=" . $item['nim'] . "&kode_mk=" . $item['kode_mk'] . "' class='btn btn-danger btn-sm'>Delete</a>&nbsp;";
                                echo "<a href='updateNilaiView.php?nim=" . $item['nim'] . "&kode_mk=" . $item['kode_mk'] . "' class='btn btn-primary btn-sm updateBtn'>Update</a>&nbsp;";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>No data available</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>Failed to fetch data</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
