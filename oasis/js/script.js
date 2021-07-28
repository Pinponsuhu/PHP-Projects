 function username(){
     if(document.getElementById('carret').classList.contains('rotate-180')== true){
         document.getElementById('extra').classList.add('hidden');
         document.getElementById('carret').classList.remove('rotate-180');
     }else{
        document.getElementById('extra').classList.remove('hidden');
        document.getElementById('carret').classList.add('rotate-180');
     }
 }
 function hidePopUp(){
    document.getElementById('popUp').classList.add('hidden');
 }
 function navDisp(){
    if(document.getElementById('navBtn').innerHTML == '⚍'){
    document.getElementById('mobileNav').classList.remove('hidden');
    document.getElementById('navBtn').innerHTML = 'x';
    }else{
        document.getElementById('mobileNav').classList.add('hidden');
        document.getElementById('navBtn').innerHTML = '⚍';  
    }
}
