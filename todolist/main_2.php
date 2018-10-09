<?php
include "../config/koneksi.php"; 

if(isset($_POST['submit'])) {
	 $title = $_POST['todoTitle'];
	 // $description = $_POST['todoDescription'];

	$query = "INSERT INTO todolist(todo_title) VALUES ('$title')";
	$insertTodo = mysqli_query($mysqli, $query);
	if($insertTodo){
	   echo "successfully";
	}else{
	   echo mysqli_error($mysqli);
	}
	mysqli_close($mysqli);
}


?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    

	<link rel="stylesheet" href="css/fontstyle.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.css">
    <link rel="stylesheet" href="css/simple-todos.css">
    
    <script data-main="js/main" src="js/libs/require/require.js"></script>
 
 <title>my todos</title>
</head>

<body>

 <div id="todoapp">        
        <div class="container">            
            <div class="row">
                <div class="page-header">
                    <h1>Todo List
                        <small>Buat List Kegiatanmu sekarang!</small>
                    </h1>
                </div>
            </div>

 			<div class="row">
                <div id="create-todo" class="well">
                    <input name="todoTitle" id="new-todo" placeholder="Apa yang harus dikerjakan?" type="text" class="span8" />
                    <span class="ui-tooltip-top help-inline" style="display:none;">Press Enter to save this task</span>
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
                    <p>Based on 
                        <a href="http://github/debbysa">Deby</a>
                    </p>
                </div>
            </div>
        </div>
 </div>

</body>
</html>