<?php
session_start();

$nama = $_SESSION['nama'];

if(!isset($_SESSION['nama'])) {
    header('location: ../index.php'); 
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>Todo App</title>
    
    <link rel="stylesheet" href="css/fontstyle.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/simple-todos.css">
    
    <script data-main="js/main" src="js/libs/require/require.js"></script>
</head>

<body>
    <div id="todoapp">        
        <div class="container">            
            <div class="row">
                <p align="right"><a href="../logout.php">LOG OUT</a></p>
                <div class="page-header">
                    <h1>Todo List
                        <small>Catat Kegiatanmu Mulai Sekarang!!</small>
                    </h1>
                </div>
            </div>

            <div class="row">
                <div id="credits"><b>Welcome, <?php echo $nama;?> </b></div>
            </div>
            
            <div class="row">
                <div id="create-todo" class="well">
                    <input id="new-todo" placeholder="Apa yang ingin dilakukan?" type="text" class="span8" />
                    <span class="ui-tooltip-top help-inline" style="display:none;">Tekan Enter untuk Menyimpan</span>
                </div>
            </div>
            
            <div class="row">
                <div id="mark-all-done"></div>
            </div>
            
            <div class="row">
                <table id="todos" class="table table-bordered table-striped">
                    <tbody id="todo-list"></tbody>
                </table>
            </div>
            
            <div class="row">
                <div id="todo-stats"></div>
            </div>
            
            <div class="row">
                <div id="credits" class="well">
                    <p>Based on &copy Website Todolist MI 1E
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>