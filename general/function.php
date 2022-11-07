<?php
function go($path){
echo "<script>
window.location.replace('/agancy/$path')
</script>
";

}
function auth(){
    if(isset($_SESSION['auth'])){

    }
    else{
        go("/login.php");
    }
}
function role($role1=0,$role2=0){
    if($_SESSION['auth']['role']==$role1||$_SESSION['auth']['role']==$role2){

    }
    else{
        go("/");
    }
}

auth();
?>