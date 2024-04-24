<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data Nilai</h2>
                    </div>
                    <p>Please fill this form and submit to add student record to the database.</p>
                    <form action="insertNilaiDo.php" method="post">
                        <div class="form-group">
                            <label>nim</label>
                            <input type="text" name="nim" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>kode_mk</label>
                            <input type="text" name="kode_mk" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>nilai</label>
                            <input type="text" name="nilai" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>