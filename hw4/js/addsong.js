
function addsong(){
    songs = localStorage.getItem('songs');
  
        if(songs == null){
            songs = [];
        }else{
            songs = JSON.parse(songs);
        }
        data = [
            namesong = document.getElementById('addsong').value,
            artist = document.getElementById('artist').value,
            lyrics = document.getElementById('lyrics').value
        ];
            songs.push(data);
        console.log(songs);
        localStorage.setItem('songs',JSON.stringify(songs));

    
}

function clearform() {
    document.getElementById('addsong').value = ''
    document.getElementById('artist').value = ''
    document.getElementById('lyrics').value = ''
  }
