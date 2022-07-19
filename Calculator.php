<?php
$ptt ='';
if(isset($_GET["cal"])){
   $ptt=$_GET["cal"];
};
$answer='';
$testVal=3;
switch($ptt){
    case '+':
      $answer=(float)($_GET["firstVal"])+(float)($_GET["secondVal"]);
      break;
    case '-':
      $answer=(float)($_GET["firstVal"])-(float)($_GET["secondVal"]);
      break;
    case '*':
      $answer=(float)($_GET["firstVal"])*(float)($_GET["secondVal"]);
      break;
    case '/':
      $answer=(float)($_GET["firstVal"])/(float)($_GET["secondVal"]);
      break;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./calculator.css">
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="get"  style="display:none">
    <input type="number" class="firstVal" name="firstVal">
    <input type="number" class="secondVal" name="secondVal">
    <!--<select name="cal" id="cal">;
        <option value=""></option>
        <option value="+">+</option>+
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>-->
    <input type="text" name="cal" id="cal">
    <input type="submit" class="submit" name="cal2">
    </form>
    
    <div id="calculator" >
        <div id="screen">
             <?php 
             if($ptt!==''){echo $_GET["firstVal"].$ptt.$_GET["secondVal"]."=".$answer;}
             header('localhost:8080/Project1/calculator.php');
             ?>
        </div>
        <div class="button">
          <span>
            <input type="button" value="1" class="btn">
            <input type="button" value="2" class="btn">
            <input type="button" value="3" class="btn">
            <input type="button" value="4" class="btn">
            <input type="button" value="5" class="btn">
            <input type="button" value="6" class="btn">
            <input type="button" value="7" class="btn">
            <input type="button" value="8" class="btn">
            <input type="button" value="9" class="btn">
            <input type="button" value="0" class="btn">
          </span>
          <span>
            <input type="button" value="+" class="btn">
            <input type="button" value="-" class="btn">
            <input type="button" value="*" class="btn">
            <input type="button" value="/" class="btn">
            <input type="button" value="=" class="btn" id="btn-answer">
          </span>
            
        </div>
    </div>

    

    <script>
const button=document.getElementsByClassName('btn');
const screen=document.querySelector('#screen');
const ipt1=document.querySelector('.firstVal');
const ipt2=document.querySelector('.secondVal');
const pt=document.querySelector('#cal');
const btnSubmit=document.querySelector('.submit');

var answer=<?php echo json_encode($testVal)?>;

/*if(answer!==''){
  var x=(<?php if(isset($_GET["firstVal"])){echo json_encode($_GET["firstVal"]);}?> || 'x');
  var y=(<?php  if(isset($_GET["secondVal"])){echo json_encode($_GET["secondVal"]);}?> || 'y');
  screen.innerHTML=`${x}+${y}=${answer}`;
}*/

function handleCLick(e){
   if(e.target.value!=='0' && e.target.value!=='2' && e.target.value!=='3' && e.target.value!=='4' && e.target.value!=='5' && e.target.value!=='6' && e.target.value!=='7' && e.target.value!=='8' && e.target.value!=='9' && e.target.value!=='1'){
    if(ipt1.value.length !==0){
        pt.value=e.target.value;
    }
   }else if(ipt1.value.length!==0 && pt.value.length!==0){
    ipt2.value+=e.target.value;
   }else{
    ipt1.value+=e.target.value;
   }

   screenChange();
}

function screenChange(){
    console.log(ipt1.value);
    screen.innerHTML=ipt1.value+pt.value+ipt2.value;
}




//console.log(button);


for(var i=0;i<button.length;i++){
    button[i].onclick=(e)=>{
        handleCLick(e);
    }
}

button[button.length-1].onclick=()=>{
    btnSubmit.click();
}


    </script>
</body>
</html>