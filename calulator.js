const button=document.getElementsByClassName('btn');
const screen=document.querySelector('#screen');
const ipt1=document.querySelector('.firstVal');
const ipt2=document.querySelector('.secondVal');
const pt=document.querySelector('#cal');
const btnSubmit=document.querySelector('.submit');

function handleCLick(e){
   if(e.target.value!=='0' && e.target.value!=='2' && e.target.value!=='3' && e.target.value!=='4' && e.target.value!=='5' && e.target.value!=='6' && e.target.value!=='7' && e.target.value!=='8' && e.target.value!=='9' && e.target.value!=='1'){
    if(ipt1.value.length !==0){
        pt.value=e.target.value;
    }
   }else if(ipt1.value.length!==0 && pt.value!==''){
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

export {ipt1,ipt2,pt};


