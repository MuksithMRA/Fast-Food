<?php  
session_start();
if(isset($_POST["categories"])){
    $cat = $_POST["categories"];
    echo "
    <script type='text/javascript'>
        const mainDiv = document.querySelector('.test');
        mainDiv.InnerHTML = 'Test Working';
    </script>
    ";
   header("Location: /index.php?cato=$cat");
}else{
    echo "Not setted";
}
  

?>