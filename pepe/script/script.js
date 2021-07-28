function disNav(){
       if(document.getElementById('menu-btn').innerHTML == '☲'){
    document.getElementById('nav').classList.remove('hidden');
    document.getElementById('menu-btn').innerHTML = 'x';
    }else{
        document.getElementById('nav').classList.add('hidden');
        document.getElementById('menu-btn').innerHTML = '☲';  
    }
}